<?php


namespace SITE;


class RenderHandler
{
    public function render(string $file, array $data) : string
    {
        if (!is_file($file)) {
            trigger_error("File {$file} does not exist");
            exit();
        }
        $content = file_get_contents($file);
        foreach($data as $key=>$value)
        {
            $content = str_replace("{{{$key}}}", $value, $content);
        }
        return $content;
    }
}