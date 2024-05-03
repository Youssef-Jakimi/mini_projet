function validerpsw() {
    var password = document.getElementById("password").value;
    var rPassword = document.getElementById("rpassword").value;

    if (password !== rPassword) {
      alert("Verifier Mots de Pass");
      return false;
    }
    return true;
  }

  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }