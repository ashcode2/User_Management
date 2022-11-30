<?php

    require_once 'session.php';

    //Handle Add New Note Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'add_note'){
       $title = $cuser->test_input($_POST['title']);
       $note = $cuser->test_input($_POST['note']);

       $cuser->add_new_note($cid, $title, $note);
    }

    //Handle Display All Notes of a User
    if(isset($_POST['action']) && $_POST['action'] == 'display_notes'){
        $output = '';

        $notes = $cuser->get_notes($cid);

        if($notes){
            $output .= '<table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
        foreach ($notes as $row) {
            $output .= '<tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['title'].'</td>
                            <td>'.substr($row['note'],0, 255).'...</td>
                            <td>
                                <a href="#" title="View Details" class="text-success infoBtn">
                                    <i class="fas fa-info-circle fa-lg"></i></a>&nbsp;

                                <a href="#" title="Edit Note" class="text-primary editBtn">
                                    <i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editNoteModal"></i></a>&nbsp;

                                <a href="#" title="Delete Note" class="text-danger deleteBtn">
                                    <i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;
                            </td>
                        </tr>';
        }
        $output .= '</tbody></table>';
        echo $output;
    }
    else{
        echo '<h3 class="text-center text-secondary">:( You have not written any note yet! Write your first note now!</h3>';
    }
 
}

//Handle Profile Update Ajax Request
if(isset($_FILES['image'])){
    $name = $cuser->test_input($_POST['name']);
    $email = $cuser->test_input($_POST['email']);
    $cgender = $cuser->test_input($_POST['gender']);
    $dob = $cuser->test_input($_POST['dob']);
    $phone = $cuser->test_input($_POST['phone']);

    $oldImage = $_POST['image'];
    $folder = 'assets/profile_pic/';

    if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] !="")){
        $newImage = $folder.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $newImage);

        if($oldImage != null){
            unlink($oldImage);
        }
    }
    else{
        $newImage = $oldImage;
    }
    $cuser->update_profile($name, $email, $gender, $dob, $phone, $newImage, $cid);
}
?>