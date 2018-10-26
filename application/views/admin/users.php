<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuários</h1>
    </div>
</div>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Produtos
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>Habilitado</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $idx=>$user): ?>
                        <tr class="odd gradeX">
                            <td><?php echo $user['name']?></td>
                            <td><?php echo $user['email']?></td>
                            <td><?php echo $user['profile']?></td>
                            <?php if($user['enabled']): ?>
                                <td>Sim</td>
                                <td>
                                    <?php if($this->session->userdata()['user.id'] != $user['id']): ?>
                                        <a href="/admin/users/disable/<?php echo $user['id'] ?>">Desabilitar</a>
                                    <?php endif; ?>
                                </td>
                            <?php else: ?>
                                <td>Não</td>
                                <td><a href="/admin/users/enable/<?php echo $user['id'] ?>">Habilitar</a></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->