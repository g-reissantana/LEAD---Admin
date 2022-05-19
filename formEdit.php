<?php
    require('config.php');
    require('./dao/StudentsDaoMySql.php');

    $usuarioDao = new StudentsDaoMySql($pdo);
    
    $id = filter_input(INPUT_GET, 'id');
    $studentById = false;

    if($id) {
        $studentById =  $usuarioDao -> getStudentById($id);
    }

    if($studentById === false) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEAD - Editar Aluno</title>

     <!-- CSS -->
     <link rel="stylesheet" href="./css/formStudent.css">
     
</head>

<a class="buttonvolta" href="index.php">Voltar</a>
<form action="edit.php" method="POST">
    <label class="name">
        <h3>Nome </h3>
        <input required name="name" type="text" value="<?=$studentById -> getName();?>">
    </label>

    <label class="class">
        <h3>Turma </h3>
        <select required name="class" id="classId">
            <option value="<?=$studentById -> getClass()?>">ATUAL</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
            <option value="G">G</option>
            <option value="H">H</option>
        </select>
    </label>

    <label class="year">
        <h3>Ano </h3>
        <select required name="year" id="yearId">
            <option value="<?=$studentById -> getYear()?>">ATUAL</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </label>

    <label class="phone">
        <h3>
            Telefone<span>(somente números)</span>
        </h3>
        <input minlength="11" maxlength="11" required value="<?=$studentById -> getPhone();?>" name="phone" type="text">
    </label>

    <label class="participation">
        <h3>Participação</h3>
        <div class="row">
            <input required value="<?=$studentById -> getParticipation();?>" name="participation" type="number" />
            <h2>%</h2>
        </div>
    </label>

    <label class="age">
        <h3>Idade</h3>
        <input required value="<?=$studentById -> getAge();?>" name="age" type="number">
    </label>

    <label class="sex">
        <h3>Sexo</h3>
        <select required name="sex" id="sexId">
            <option value="<?=$studentById -> getSex()?>">ATUAL</option>
            <option value="M">M</option>
            <option value="F">F</option>
        </select>
    </label>
    
    <label class="area">
        <h3>Área </h3>
        <select required name="area" id="areaId">
            <option value="<?=$studentById -> getArea()?>">ATUAL</option>
            <option value="progamação">Programação</option>
            <option value="empreendedorismo">Empreendedorismo</option>
            <option value="marketing">Marketing</option>
        </select>
    </label>

    <label class="electiveFreq">
        <h3 title="Frequência na eletiva">
            Freq. Eletiva<span>(somente números)</span>
        </h3>
        <div class="row">
            <input required value="<?=$studentById -> getElectiveFreq();?>" name="electiveFreq" type="number">
            <h2>%</h2>
        </div>
    </label>

    <label class="scoreAlura">
        <h3 title="Pontuação na Alura">
            Score Alura<span>(somente números)</span>
        </h3>
        <input required value="<?=$studentById -> getScoreAlura();?>" name="scoreAlura" type="number">
    </label>

    <label class="objective">
        <h3 title="Objetivo do estudante">
            Objetivo
        </h3>
        <textarea required name="objective" id="objectiveId" cols="30" rows="5"><?=$studentById -> getObjective();?></textarea>
    </label>

    <input required name="id" type="hidden" value="<?=$id?>">

    <div class="btn-submit">
        <button class="add-user" type="submit">
            <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22 2v22h-20v-22h3c1.23 0 2.181-1.084 3-2h8c.82.916 1.771 2 3 2h3zm-11 1c0 .552.448 1 1 1 .553 0 1-.448 1-1s-.447-1-1-1c-.552 0-1 .448-1 1zm9 1h-4l-2 2h-3.897l-2.103-2h-4v18h16v-18zm-13 9.729l.855-.791c1 .484 1.635.852 2.76 1.654 2.113-2.399 3.511-3.616 6.106-5.231l.279.64c-2.141 1.869-3.709 3.949-5.967 7.999-1.393-1.64-2.322-2.686-4.033-4.271z"/></svg>
            Salvar
        </button>
    </div>
</form>
