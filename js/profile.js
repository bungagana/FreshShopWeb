function showEditForm() {
    var editForm = document.getElementById("editProfileForm");
    editForm.style.display = "block";
}

function saveChanges() {
    // You can add client-side validation here if needed

    // Submit the form
    var profileForm = document.getElementById("profileForm");
    profileForm.submit();
}