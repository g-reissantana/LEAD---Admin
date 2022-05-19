<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEAD - Adicionar Aluno</title>

     <!-- CSS -->
     <link rel="stylesheet" href="./css/formStudent.css">
     
</head>
<body>

    <a class="buttonvolta" href="index.php">Voltar</a>


    <form action="newStudent.php" method="POST">

        <label class="name">
            <h3>Nome</h3>
            <input placeholder="Nome do aluno" required name="name" type="text">
        </label>

        <label class="class">
            <h3>Turma</h3>
            <select required  name="class" id="classId">
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
            <h3>Ano</h3>
            <select required name="year" id="yearId">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </label>

        <label class="phone">
            <h3>
                Telefone <span>( somente números: 11 )</span>
            </h3>
            <input placeholder="DDD+9+Número" minlength="11" maxlength="11" min="0" required name="phone" type="number">
        </label>

        <label class="participation">
            <h3>Participação</h3>
            <div class="row">
                <input placeholder="" min="0" required name="participation" type="number">
                <h2>%</h2>
            </div>
        </label>

        <label class="age">
            <h3>Idade</h3>
            <input min="0" required name="age" type="number">
        </label>

        <label class="sex">
            <h3>Sexo</h3>
            <select required name="sex" id="sexId">
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
        </label>
        
        <label class="area">
            <h3>Área</h3>
            <select required name="area" id="areaId">
                <option value="progamação">Programação</option>
                <option value="empreendedorismo">Empreendedorismo</option>
                <option value="marketing">Marketing</option>
            </select>
        </label>

        <label class="electiveFreq">
            <h3 title="Frequência na eletiva">
                Freq. Eletiva <span>(somente números)</span>
            </h3>
            <div class="row">
                <input min="0" required name="electiveFreq" type="number">
                <h2>%</h2>
            </div>
        </label>

        <label class="scoreAlura">
            <h3 title="Pontuação na Alura">
                Score Alura <span>(somente números)</span>
            </h3>
            <input placeholder="Pontos" min="0" required name="scoreAlura" type="number">
        </label>

        <label class="objective">
            <h3 title="Objetivo do estudante">
                Objetivo
            </h3>
            <textarea placeholder="Objetivo do aluno com o LEAD" required name="objective" id="objectiveId" cols="30" rows="5"></textarea>
        </label>

        <div class="btn-submit">
            <button class="add-user" type="submit">
              <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
                Adicionar Usuário
            </button>
        </div>
    </form>
</body>
</html>
