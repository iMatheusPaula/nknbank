<?php

namespace Source;

use DateTime;
use DateTimeZone;
use PDOException;

class FormHandler extends MySQL
{
    public function getForm()
    {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if($formData['name'] == '') return [false, "Preencha o nome!"];
        if($formData['birthday'] == '') return [false, "Preencha sua data de nascimento"];
        if($formData['email'] == '' || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) return [false, "e-mail invalido"];
        if($formData['password'] == '') return [false, "Preencha a senha!"];
        if($formData['confirmPassword'] != $formData['password']) return [false, "As senhas não conferem"];
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,}$/', $formData['password'])){
            return [false, 'Senha não atende os requisitos'];
        }
        if($this->checkAge($formData['birthday'])) return [false, "Você precisa ser maior de 18 anos"];
        if($this->checkEmail($formData['email'])) return [false, "E-mail já cadastrado"];
        $setTimeZone = new DateTimeZone('America/Sao_Paulo');
        $dataLog = new DateTime();
        try{
//            $query = "INSERT INTO lead (nome, datanascimento, email, senha, whatsapp, datalog) VALUES (?,?,?,?,?,?)";
//            $stmt= $this->connection->prepare($query);
//            $stmt->execute([
//                $formData['name'],
//                $formData['birthday'],
//                $formData['email'],
//                $formData['password'],
//                $formData['whatsapp'],
//                $dataLog->format("Y-m-d H:i:s")
//            ]);
//            $mailMesssage = "Olá {$formData['name']}, seu cadastro no banco NKN foi realizado com sucesso.";
//            mail(
//                $formData['email'],
//                "Bem-Vindo ao NKN Bank!",
//                $mailMesssage
//            );
            return [true, "Obrigado"];
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    private function checkAge(string $birthday): bool
    {
        $dateNow = new DateTime();
        $birthday = new DateTime($birthday);

        if($dateNow->diff($birthday)->y >= 18) return false;
        return true;
    }
    private function checkEmail(string $email): bool
    {
        $query = "SELECT email FROM lead WHERE email = ?";
        $stmt= $this->connection->prepare($query);
        $stmt->execute([$email]);

        if($stmt->rowCount() > 0) return true;
        return false;
    }
}
