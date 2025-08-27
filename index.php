<?php
include './template/header.php';

$scriptConsulta = "SELECT trs.id, ts.identificacao as 'nome_sala', td.nome as 'nome_docente', tt.sigla as 'sigla_turma'
                    FROM tb_reservas_sala trs
                    inner join tb_sala ts on trs.sala_id = ts.id
                    inner join tb_turma tt on trs.turma_id = tt.id
                    inner join tb_docente td on trs.docente_id = td.id";

$resultados = $conn->query($scriptConsulta)->fetchAll();

?>

<section class="container vh-100">

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sala</th>
                <th scope="col">Turma</th>
                <th scope="col">Docente</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultados as $linha) { ?>
            <tr>
                <th scope="row"><?= $linha['id'] ?></th>
                <td><?= $linha['nome_sala'] ?></td>
                <td><?= $linha['sigla_turma'] ?></td>
                <td><?= $linha['nome_docente'] ?></td>
                <td>
                    <a href="#" class="btn btn-danger">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</section>


</body>

</html>