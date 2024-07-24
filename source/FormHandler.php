<?php

namespace Source;

class FormHandler extends MySQL
{
    public function getForm()
    {
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if($formData['name'] == '') echo "Preencha o nome!";
        if($formData['birthday'] == '') echo "Preencha sua data de nascimento";
        if($formData['email'] == '' || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) echo "e-mail invalido";
        if($formData['password'] == '') echo "Preencha a senha!";
        if($formData['confirmPassword'] != $formData['password']) echo "As senhas não conferem";
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6}$/', $formData['password'])){
            echo 'Senha não atende os requisitos';
        }
        if($this->checkAge($formData['birthday'])) echo "Você precisa ser maior de 18 anos";
        if($this->checkEmail($formData['email'])) echo "E-mail já cadastrado";

        $query = "INSERT INTO lead (nome, datanascimento, email, senha, whatsapp, datalog) VALUES (?,?,?,?,?,?)";
        $stmt= $this->connection->prepare($query);
        $stmt->execute([
            $formData['name'],
            $formData['birthday'],
            $formData['email'],
            $formData['password'],
            $formData['whatsapp'],
            new \DateTime()
        ]);
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
