<?php


namespace RankologyFno\Services\StopWords;

class FinderStopWords
{

    

    public function __construct(){
        $this->buildHandlers();
    }

    /**
     * @param string $language
     *
     * @return array
     */
    public function find($language)
    {
        $language = mb_strtolower($language);

        $filePath = $this->inHandlers($language);

        if(!$filePath){
            return [];
        }

        $result = json_decode(file_get_contents($filePath), true);

        return $result['words'];
    }

    protected function inHandlers($handler) {
        $filePath = null;

        foreach ($this->handlers as $filename => $handlers) {
            if (in_array($handler, $handlers)) {
                $filePath = sprintf('%s/%s',RANKOLOGY_FNO_TEMPLATE_STOP_WORDS, $filename);
                break;
            }
        }

        return $filePath;
    }
    public $handlers ;
    protected function buildHandlers()
    {
      
        $fileList = preg_grep('~\.(json)$~', scandir(RANKOLOGY_FNO_TEMPLATE_STOP_WORDS));

        foreach ($fileList as $item) {
            $content = json_decode(file_get_contents(sprintf('%s/%s',RANKOLOGY_FNO_TEMPLATE_STOP_WORDS, $item)), true);
            if(isset($content['handlers'])){
                $handlers[$item] = $content['handlers'];
            }
        }

        $this->handlers = $handlers;
    }
}
