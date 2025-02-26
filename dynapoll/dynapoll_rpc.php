<?php
include 'xmlrpc.inc';

function send_rpc_request($f)
	{
		$c=new xmlrpc_client("rpc", "dynapoll.net", 80);
		$c->setDebug(0);

		$r=&$c->send($f);

		if(!$r->faultCode())
		{
			$v=$r->value();

			if ($v->kindOf() == "struct")
			{
				if ($v->structMemExists('_html'))
				{
					$result = $v->structMem('_html')->scalarVal();
				}
				else
				{
					$result = 'There was an error displaying this poll.';
				}
			}
			else
			{
				$result = 'There was an error displaying this poll.';
			}

		}
		else
		{
			//$result = htmlspecialchars($r->faultCode());
			$result = htmlspecialchars($r->faultString()); // . '(' . htmlspecialchars($r->faultCode()) . ')';
		}
		return $result;
	}
?>