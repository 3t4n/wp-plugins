jQuery(document).ready(function ($) {
    if ($('.colorpicker').length > 0) {
        jQuery('.colorpicker').spectrum({
        });
    }

    // Add target blank to doc menu
    $('li.custom-firebase-auth .wp-submenu-wrap li:last-child() a').attr('target', '_blank')

    firebase.initializeApp(firebaseConfig);
    const dbRef = firebase.database().ref("users");
    dbRef.on('value', function (snapshot) {
        var userlistHTML = '';
        if (snapshot.exists()) {
            snapshot.forEach(function (childSnapshot, index) {
                var childkey = childSnapshot.key; // Firebase user key
                var childData = childSnapshot.val();
                userlistHTML += '<tr>';
                userlistHTML += '<td>' + childData.wp_userid + '</td>';
                userlistHTML += '<td>' + childData.username + '</td>';
                userlistHTML += '<td>' + childData.email + '</td>';
                userlistHTML += '<td>' + childData.phone_number + '</td>';
                userlistHTML += '<td>' + childData.created_at + '</td>';
                userlistHTML += '<td>' + childData.last_login + '</td>';
                userlistHTML += '<td><a href="' + frAdmin + '/user-edit.php?user_id=' + childData.wp_userid + '"><i class="fa-solid fa-user-pen"></i></a></td>';
                userlistHTML += '</tr>';
            });
            $('#fr-user-table tbody').html(userlistHTML);
        } else {
            userlistHTML += '<tr><td colspan="6">No users available</td></tr>';
            $('#fr-user-table tbody').html(userlistHTML);
        }


    });

});