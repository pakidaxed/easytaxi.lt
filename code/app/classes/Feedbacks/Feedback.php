<?php


namespace App\Feedbacks;


use Core\DataHolder;

class Feedback extends DataHolder
{
    protected array $properties = ['id', 'name', 'comment', 'date'];

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->data['id'];
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->data['id'] = $_SESSION['user_id'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->data['name'];
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->data['name'] = $name;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->data['comment'];
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->data['comment'] = $comment;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->data['date'];
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->data['date'] = date("Y-m-d H:i:s");
    }
}