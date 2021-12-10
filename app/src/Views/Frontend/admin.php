
<?php if($_SESSION['admin'] == 1) { ?>


<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Email</th>
        <th scope="col">Administrateur</th>
        <th scope="col">Action</th>

    </tr>


    </thead>
    <tbody>
    <?php foreach($users as $user) {?>
        <tr class="table-active">
            <th scope="row"><?php echo $user->getName(); ?></th>
            <td><?php echo $user->getLastName(); ?></td>
            <td><?php echo $user->getMail(); ?></td>
            <td> <input type="checkbox" id="horns" name="horns"
                    <?php if( $user->getIsAdmin()==true){  ?>
                        checked
                <?php }  ?> </td>
            <td><form action="admin-delete-user" method="post">
                    <button type="submit" value="<?php echo $user->getId();?>" name="id" class="btn btn-danger">Supprimer</button>
                </form>

            </td>

        </tr>
    <?php } ?>
    </tbody>

</table>

<?php }else { ?>

<br> <br>

<p>Vous devez être administrateur pour accéder à cette page !</p>

<?php } ?>