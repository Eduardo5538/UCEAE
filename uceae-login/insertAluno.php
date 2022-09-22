<?php
    include '../conection.php';

    $email_aluno = $_POST['email'];
    $senha_aluno = $_POST['senha'];
    $nome_aluno = $_POST['nome'];
    $sobrenome_aluno = $_POST['sobrenome'];
    $cpf_aluno = $_POST['cpf'];
    $data_nasc_aluno = $_POST['nasc'];
    $cep_aluno = $_POST['cep'];
    $rua_aluno = $_POST['rua'];
    $bairro_aluno = $_POST['bairro'];
    $cidade_aluno = $_POST['cidade'];
    $uf_aluno = $_POST['UF'];
    $telefone_aluno = $_POST['tel'];
    $deficiencia = $_POST['nomeDefAluno'];
    $senha = $_POST['senha'];

    $nome = $nome_aluno . " " . $sobrenome_aluno;

    $ft_perfil = $_FILES['icon'];

    echo $ft_perfil['name'];

    if (!empty($ft_perfil["name"]))
  	{
  		if (!preg_match("/^image\/(jpeg|jpg|png|gif|bmp|ico)$/", $ft_perfil["type"]))
  		{
  			echo "Formato de Arquivo Inválido, Selecione uma Imagem!";
  			exit;
  		}
  		preg_match("/\.(jpeg|jpg|png|gif|jfif|bmp|ico){1}$/i", $ft_perfil["name"],$ext);
  		$nome_img = md5(uniqid(time())).".".$ext[1];
  		$caminho_img = "img/".$nome_img;
  		move_uploaded_file($ft_perfil["tmp_name"], $caminho_img);
  	}

    echo $caminho_img;

    try
    {


        $inserir = $conexao->prepare("insert into tab_alunos (cpf_aluno, nome_aluno,  email, datanasc_aluno, cep_aluno, rua_aluno, bairro_aluno, cidade_aluno, uf_aluno, telefone_aluno, deficiencia, foto_aluno) values (?,?,?,?,?,?,?,?,?,?,?,?)");
        $inserir->bindParam(1,$cpf_aluno);
        $inserir->bindParam(2,$nome);
        $inserir->bindParam(3,$email_aluno);
        $inserir->bindParam(4,$data_nasc_aluno);
        $inserir->bindParam(5,$cep_aluno);
        $inserir->bindParam(6,$rua_aluno);
        $inserir->bindParam(7,$bairro_aluno);
        $inserir->bindParam(8,$cidade_aluno);
        $inserir->bindParam(9,$uf_aluno);
        $inserir->bindParam(10,$telefone_aluno);
        $inserir->bindParam(11,$deficiencia);
        $inserir->bindParam(12,$caminho_img);


        $inserir->execute();

        $inserir = $conexao->prepare("insert into login(login, senha, CPF, nome, imagem) values (?,?,?,?,?)");
        $inserir->bindParam(1, $email_aluno);
        $inserir->bindParam(2, $senha);
        $inserir->bindParam(3,$cpf_aluno);
        $inserir->bindParam(4,$nome);
        $inserir->bindParam(5,$caminho_img);
        $inserir->execute();

        if($inserir->rowCount() > 0)
        {
            $nome_aluno = "";
            $email_aluno = "";
            $cpf_aluno = "";
            $sexo_aluno = "";
            $data_nasc_aluno = "";
            $uf_aluno = "";
            $cep_aluno = "";
            $cidade_aluno = "";
            $bairro_aluno = "";
            $rua_aluno = "";

            $retorno = "<script>location.href='../index.php'</script>";

        }
// capturando um possível erro durando a realização do código
        else
        {
            $retorno = "falhou";
        }
    }
// capturando uma possível excessão no código
    catch(PDOException $erro)
    {
        $retorno = "$erro: ".$erro->getMessage();
    }
    echo $retorno;

?>