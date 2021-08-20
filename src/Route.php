<?php


namespace SITE;


class Route
{
    private string $file;
    private array $data;

    public function __construct(string $file, array $data)
    {
        $this->file = $file;
        $this->data = $data;
    }

    public function get_file(): string
    {
        return $this->file;
    }

    public function get_data(): array
    {
        return $this->data;
    }
}