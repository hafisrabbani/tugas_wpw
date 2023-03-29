<?php

class Response
{
    private $status;
    private $message;
    private $data;

    public function __construct(int $status = 200, string $message = '', array $data = [])
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function send()
    {
        http_response_code($this->status);
        echo json_encode([
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data
        ]);
    }
}
