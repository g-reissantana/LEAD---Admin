<?php
    session_start();
    require('config.php');
    require('dao/StudentsDaoMySql.php');
    require('dao/UsersDaoMySql.php');
    $studentsDao = new StudentsDaoMySql($pdo);
    $usersDao =  new UsersDaoMySql($pdo);

    // Get all students using StudentsDaoMySql
    $allStudents = $studentsDao -> getAllStudents();    
    
    if(!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        $user = new Users();
        $user -> setEmail($email);
        $user -> setPassword($password);

        $usersDao -> verifyUser($user);
    
    }

    if(!isset($_SESSION['email']) == true) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEAD - Tabela</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a class="logOut" onclick="return confirm('Deseja deslogar?')" href="./logout.php">Sair</a>
        <a class="btn-add" href="./formStudent.php">
            <button class="newStudent">
                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
                <span>Aluno</span>
            </button>
        </a>
    </header>

    <div class="container">
        

        <table>
            <thead>
                <tr>
                    <th title="Código de Matrícula">ID</th>
                    <th title="Nome do Aluno">Nome</th>
                    <th title="Turma do Aluno">Turma</th>
                    <th title="Ano do Aluno">Ano</th>
                    <th title="Telefone do Aluno">Telefone</th>
                    <th title="Frequência Escolar">Participação</th>
                    <th title="Idade do Aluno">Idade</th>
                    <th title="Sexo do Aluno">Sexo</th>
                    <th title="Área Escolhida no LEAD">Área</th>
                    <th title="Frequência na Eletiva" >Freq. Eletiva</th>
                    <th title="Pontuação na Plataforma Alura">Score Alura</th>
                    <th title="Objetivo do Aluno">Objetivo</th>
                    <th title="Editar | Apagar">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allStudents as $item) :?>
                    <tr>
                        <td data-id="id">
                            <?=$item->getId();?>
                        </td>

                        <td data-name="name">
                            <?=$item->getName();?>
                        </td>

                        <td data-class="class">
                            <?=$item->getClass();?>
                        </td>

                        <td data-year="year">
                            <?=$item->getYear();?>
                        </td>

                        <td data-phone="phone">
                            <?=$item->getPhone();?>
                        </td>

                        <td data-participation="participation">
                            <?=$item->getParticipation();?>
                        </td>

                        <td data-age="age">
                            <?=$item->getAge();?>
                        </td>

                        <td data-sex="sex">
                            <?=$item->getSex();?>
                        </td>

                        <td data-area="area">
                            <?=$item->getArea();?>
                        </td>

                        <td data-electiveFreq="electiveFreq">
                            <?=$item->getElectiveFreq();?>
                        </td>

                        <td data-scoreAlura="scoreAlura">
                            <?=$item->getScoreAlura();?>
                        </td>

                        <td data-objective="objective">
                            <?=$item->getObjective();?>
                        </td>

                        <td>
                            <a data-btn="btn-edit" class="edit" href="./formEdit.php?id=<?=$item->getId();?>" >
                                <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z"></svg>
                            </a>
                            <a onclick="return confirm('Deseja excluir o estudante selecionado?')" data-btn="btn-delete" href="./delete.php?id=<?=$item->getId();?>">
                                <svg fill="#e22828" xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24"><path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"></svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    
    <script>
        
        function masksTableData() {
            const id = document.querySelectorAll('[data-id=id]');
            const year = document.querySelectorAll('[data-year=year]');
            const participation = document.querySelectorAll('[data-participation=participation]');
            const electiveFreq = document.querySelectorAll('[data-electiveFreq=electiveFreq]');
            const age = document.querySelectorAll('[data-age=age]');
            const phone = document.querySelectorAll('[data-phone=phone]');
            const scoreAlura = document.querySelectorAll('[data-scoreAlura=scoreAlura]');

            id.forEach(item => {
                const digits = item.innerText;
                
                switch(digits.length) {
                    case 1:
                        return item.innerText = `000${digits}`
                        break
                    case 2:
                        return item.innerText = `00${digits}`
                    case 3:
                        return item.innerText = `0${digits}`
                    default:
                        return item.innerText = `${digits}`
                }
    
            })

            phone.forEach(item => {
                const thisNumber = item.innerText;
                if(thisNumber.length == 11) {
                    let ddd = thisNumber.slice(0,2);
                    let nineDigit = thisNumber.slice(2,3);
                    let firstPart = thisNumber.slice(3,7);
                    let lastPart = thisNumber.slice(7,11);
                    
                    return item.innerText = `(${ddd}) ${nineDigit} ${firstPart}-${lastPart}`;
    
                } else {
                    return item.innerHTML = '<span class="review">Revisar</span>';
                }
    
            })
    
            year.forEach(item => {
                let itemText = item.innerText;
    
                if(itemText != 1 && itemText != 2 && itemText != 3) {
                    itemText = 'Null';
                };
    
                item.innerText = `${itemText}°`
            });
    
            participation.forEach(item => {
                let itemText = item.innerText;
    
                if(Number(itemText) > 100) {
                    itemText = '<span class="review">Revisar</span>';
                    return item.innerHTML = `${itemText}`;
                };
    
                item.innerText = `${itemText}%`;
            });
    
            age.forEach(item => {
                let itemText = item.innerText;
    
                if(Number(itemText) > 30) {
                    itemText = '<span class="review">Revisar</span>';
                };
    
                item.innerHTML = `${itemText}`;
            });
    
            electiveFreq.forEach(item => {
                let itemText = item.innerText;
    
                if(Number(itemText) > 100) {
                    itemText = '<span class="review">Revisar</span>';
                    return item.innerHTML = `${itemText}`;
                };
    
                item.innerText = `${itemText}%`;
            });
    
            scoreAlura.forEach(item => {
                const thisScore = item.innerText;
                
                if(thisScore.length == 4) {
                    let firstPart = thisScore.slice(0,1);
                    let lastPart = thisScore.slice(1,4);
                    return item.innerText = `${firstPart}.${lastPart}`;
                } else if (thisScore.length == 5) {
                    let firstPart = thisScore.slice(0,2);
                    let lastPart = thisScore.slice(2,5);
                    return item.innerText = `${firstPart}.${lastPart}`;
                } else if (thisScore.length == 6) {
                    let firstPart = thisScore.slice(0,3);
                    let lastPart = thisScore.slice(3,6);
                    return item.innerText = `${firstPart}.${lastPart}`;
                }
            });
        }
        masksTableData();

        function editRowsAndReview() {
            const tbody = document.querySelector('table tbody');
            const rows = tbody.querySelectorAll('tr');
    
            rows.forEach((item, index) => {
                if(index%2 == 0) {
                    item.style.backgroundColor = '#52525287';
                } else {
                    item.style.backgroundColor = '#c9c9c9';
                }
            });
    
            rows.forEach((item, index) => {
                const td = item.querySelectorAll('td');
                
                td.forEach(item => {
                    if(item.innerText == 'Revisar') {
                        item.style.backgroundColor = '#D12C38';
                    }
                })
            });
        }
        editRowsAndReview();

    </script>
</body>    
</html>