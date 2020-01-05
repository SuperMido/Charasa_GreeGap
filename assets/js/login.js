function check_empty_field()
{
  if (form.username.value == "" || form.password.value == "")
  {
    alert("Please fill in the password or login field.");
    return false;
  }
  else
  {
    return true;
  }
}