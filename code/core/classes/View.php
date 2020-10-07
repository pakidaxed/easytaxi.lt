<?php


namespace Core;



class View
{
    protected array $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function render(string $template_path): string
    {
        if (!file_exists($template_path)) {
            throw (new \Exception("Template $template_path doest not exist."));
        }

        $data = $this->data;

        ob_start();

        require $template_path;

        return ob_get_clean();
    }
}