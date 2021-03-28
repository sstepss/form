<?php

function valid (array $post) : array {
    $validate = [
        'error' => false,
        'success' => false,
        'messages' => [],
    ];
    if (!empty($post['name']) && !empty($post['surname']) && !empty($post['login']) && !empty($post['password'])) {

        $name = trim($post['name']);
        $surname = trim($post['surname']);
        $login = trim($post['login']);
        $password = trim($post['password']);

        $constraints = [
            'login' => 6,
            'password' => 3,
        ];

        $validateForm = validLoginAndPassword($name, $surname, $login, $password, $constraints);

        if (!preg_match('/^[а-яА-Я]+$/iu', $name)) {
            $validate['error'] = true;
            array_push(
                $validate['messages'],
                "Имя не должно содержать числа"
            );
        }

        if (!preg_match('/^[а-яА-Я]+$/iu', $surname)) {
            $validate['error'] = true;
            array_push(
                $validate['messages'],
                "Фамилия не должна содержать числа"
            );
        }

        if ($validateForm['login']) {
            $validate['error'] = true;
            array_push(
                $validate['messages'],
                "Логин должен содержать больше {$constraints['login']} символов"
            );
        }

        if ($validateForm['password']) {
            $validate['error'] = true;
            array_push(
                $validate['messages'],
                "Пароль должен содержать больше {$constraints['password']} символов"
            );
        }

        if (!$validate['error']) {
            $validate['success'] = true;
            array_push(
                $validate['messages'],
                "Ваше имя: {$name}",
                "Ваша фамилия: {$surname}",
                "Ваш логин: {$login}",
                "Ваш пароль: {$password}"
            );
        }

        return $validate;
    }

    return $validate;
}

function validLoginAndPassword (string $name, string $surname, string $login, string $password, array $constraints) : array {
    $validateForm = [
        'name' => true,
        'surname' => true,
        'login' => true,
        'password' => true,
    ];

    if (strlen($name) < $constraints['name']) {
        $validateForm  ['name'] = false;
    }

    if (strlen($surname) < $constraints['surname']) {
        $validateForm  ['surname'] = false;
    }

    if (strlen($login) < $constraints['login']) {
        $validateForm['login'] = false;
    }

    if (strlen($password) < $constraints['password']) {
        $validateForm['password'] = false;
    }

    return $validateForm;
}
