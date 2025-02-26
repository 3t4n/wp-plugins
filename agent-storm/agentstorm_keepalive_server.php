<?php

error_reporting(E_ALL);

function writeLine($line) {
    echo $line."\r\n";
}

function unchunkHttp11($data) {
    $fp = 0;
    $outData = "";
    while ($fp < strlen($data)) {
        $rawnum = substr($data, $fp, strpos(substr($data, $fp), "\r\n") + 2);
        $num = hexdec(trim($rawnum));
        $fp += strlen($rawnum);
        $chunk = substr($data, $fp, $num);
        $outData .= $chunk;
        $fp += strlen($chunk);
    }
    return $outData;
}

header('Content-Type: text/plain; charset=ISO-8859-1');

ob_start();

writeLine('--------------------------------------------------------------------------------');
writeLine('StormRETS API Pipelining Server');
writeLine('Copyright (c) 2010-2011 StormRETS, Inc.');
writeLine('--------------------------------------------------------------------------------');
writeLine('This server uses shared memory to pass data between the server and the executing');
writeLine('PHP script utilizing HTTP Keep Alive to cut out API connection time between');
writeLine('page loads.');
writeLine('');
writeLine('This API Pipelining Server is currently experimental.');
writeLine('--------------------------------------------------------------------------------');
writeLine('');

$queue = msg_get_queue(100381);
$required_msgtype = 1;
$maxsize = 2048;
$option_receive = MSG_IPC_NOWAIT;
$serialize_needed = true;
$queue_status = msg_stat_queue($queue);
$max_message_size = $queue_status['msg_qbytes'] - 100;
$socket = null;

writeLine('Waiting for Data...');

while (true) {
    
    // Check for Messages in the Queue
    $queue_status = msg_stat_queue($queue);
    if ($queue_status['msg_qnum'] > 0) {
        
        $data = '';
        if (msg_receive($queue, $required_msgtype, $msgtype, $maxsize, $data, $serialize_needed, $option_receive, $err)===true) {
            
            echo "[-] Received a Message...\n";
            $data = json_decode($data);
            $return_type = $data->rt;
            $url = $data->url;
            
            $header = '';
            
            if ($url && ($data->validity >= time())) {
                
                echo "[-] Message is Valid...\n";
                $url_data = parse_url($url);
                
                $req_path = $url_data['path'];
                if (array_key_exists('query', $url_data) && !empty($url_data['query'])) $req_path .= '?' . $url_data['query'];
                
                $req = "";
                $req .= "GET $req_path HTTP/1.1\r\n";
                $req .= "Host: {$url_data['host']}\r\n";
                $req .= "Connection: Keep-Alive\r\n";
                $req .= "Keep-Alive: 300\r\n";
                $req .= "Accept-Encoding: deflate\r\n";
                $req .= "Accept: */*\r\n";
                $req .= "\r\n\r\n";
                
                # If no socket or socket closed create a socket
                $socket = pfsockopen($url_data['host'], 80);
                
                $transfer_start = microtime(true);
                
                $response = '';
                fputs($socket, $req);
                stream_set_blocking($socket, true); 
                stream_set_timeout($socket, 5);
                $socket_info = stream_get_meta_data($socket); 
                
                do {
                    $header .= fread($socket, 1); 
                }
                while (!preg_match('/\\r\\n\\r\\n$/', $header));
                
                echo $header;
                
                if (!strstr($header, "Transfer-Encoding: chunked")) {
                    while (!feof($socket)) {
                        $response .= fgets($socket, 128);
                    }
                } else {
                    while ($chunk_length = hexdec(fgets($socket)))  {
                        $responseContentChunk = '';
                        
                        $read_length = 0;
                        
                        while ($read_length < $chunk_length) {
                            $responseContentChunk .= fread($socket, $chunk_length - $read_length);
                            $read_length = strlen($responseContentChunk);
                        }
                        
                        $response .= $responseContentChunk;
                        fgets($socket);
                    }
                }
                
                $transfer_end = microtime(true);
                $transfer_time = $transfer_end - $transfer_start;
                echo "[-] Transfer took {$transfer_time} seconds\n";
                
                # Strip Headers
                //$response = trim(substr($response, strpos($response, "\r\n\r\n")));
                
                $return_start = microtime(true);
                
                $ret_queue = msg_get_queue($data->rt);
                $response_arr = str_split($response, $max_message_size);
                
                # Send the Chunks
                $chunk_count = 0;
                foreach ($response_arr as $a) {
                    $retry_count = 0;
                    $message = array(
                        'chunks' => sizeof($response_arr),
                        'chunk' => $chunk_count,
                        'encoding' => (strstr($header, "Content-Encoding")) ? 'deflate' : 'plain',
                        'data' => $a,
                    );
                    while ($retry_count <= 5) {
                        if (@msg_send($ret_queue, 1, $message, true, false, $err)) {
                            $retry_count = 100;
                        } else {
                            $retry_count++;
                            usleep(5000);
                        }
                        if ($retry_count == 5) {
                            echo "[!] Chunk Transfer Failed\n";
                        }
                    }
                    $chunk_count++;
                }
                
                $return_end = microtime(true);
                $return_time = $return_start - $return_end;
                echo "[-] Return to Caller took {$return_time} seconds\n";
                
            }
            
        }
        
    }
    
    # Flush everything
    if (ob_get_length()){            
        @ob_flush();
        @flush();
        @ob_end_flush();
    }
    
    sleep(1);
    
}

