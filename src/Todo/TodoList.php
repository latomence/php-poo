<?php

use Tompe\Cours\Todo\Todo;
use Tompe\Cours\Todo\DateTime;

class todoList
{
    public array $todos = [];


    public function addTodo(Todo $todo): self
    {
        $this->todos[] = $todo;
        return $this;
    }

    public function showCompleted(): array
    {
        return $this->filter(fn(Todo $todo) => $todo->isCompleted());
    }

    public function filter(callable $filterFunction): array
    {
        return array_filter($this->todos, $filterFunction);
    }

    public function showNotCompleted(): array
    {
        return $this->filter(fn(Todo $todo) => !$todo->isCompleted());
    }

    public function setAllCompleted(): self
    {
        foreach ($this->todos as $todo) {
            $todo->setCompleted();
        }
        return $this;
    }

    public function searchedTodos(string $search): array
    {
        return $this->filter(fn(Todo $todo) => str_contains($todo->title . $todo->description, $search));
    }

}