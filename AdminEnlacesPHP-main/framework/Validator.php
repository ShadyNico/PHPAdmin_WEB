<?php

class Validator
{
    private array $data;
    private array $rules;
    private array $errors = [];

    public function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public static function make(array $data, array $rules): self
    {
        return new self($data, $rules);
    }

    public function validate(): void
    {
        foreach ($this->rules as $field => $rulesString) {
            $value = $this->data[$field] ?? null;
            $rules = explode('|', $rulesString);

            foreach ($rules as $rule) {
                $parts = explode(':', $rule, 2);
                $name = $parts[0];
                $limit = isset($parts[1]) ? (int) $parts[1] : null;

                if ($name === 'required' && ($value === null || $value === '')) {
                    $this->errors[$field][] = 'Este campo es obligatorio.';
                }

                if ($value !== null && $value !== '' && $name === 'numeric' && !is_numeric($value)) {
                    $this->errors[$field][] = 'Debe ser un número.';
                }

                if ($value !== null && $value !== '' && $name === 'min' && $limit !== null) {
                    if (mb_strlen((string) $value) < $limit) {
                        $this->errors[$field][] = "Debe tener al menos {$limit} caracteres.";
                    }
                }

                if ($value !== null && $value !== '' && $name === 'max' && $limit !== null) {
                    if (mb_strlen((string) $value) > $limit) {
                        $this->errors[$field][] = "No puede exceder {$limit} caracteres.";
                    }
                }
            }
        }

        if ($this->errors) {
            SessionManager::flash('errors', $this->errors);
            SessionManager::flash('old', $this->data);
            $referer = $_SERVER['HTTP_REFERER'] ?? '/products';
            redirect($referer);
        }
    }
}
