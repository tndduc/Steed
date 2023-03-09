<style>
    body{
  background-color: #f5f5f5;
  color: #313131;
  font-family: "Roboto",sans-serif;
  display:flex;
  justify-content:center;
  align-items:center;
  height:100vh;
}
.input-group{
  margin:1rem 0;
  position: relative;
}
form{
  background-color: white;
  padding: 1rem 1.2rem;
  box-shadow:.4px 4px 12px rgba(0,0,0,.2);
  border-radius:1rem;
  text-shadow: .4px .4px 5px rgba(0,0,0,.2)
  
}
form h2{
  text-align:center;
  font-weight:400;
  user-select:none;
}
form input{
  display:block;
  margin: auto;
  border:none;
  border-bottom: 2px solid dodgerblue;
  outline:none;
  padding: 6px 4px;
}
form label{
  position:absolute;
  left:15px;
  top:4px;
  font-weight:300;
  font-size:15px;
  pointer-events:none;
  color:gray;
  transition: .3s ease;
}
input:focus+label,input:valid +label{
  top:-10px;
  color: dodgerblue;
  font-size:13px;
  left:5;
}
.btn-logn-in{
  padding: .5rem 1rem;
background-image: linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%);
  border:none;
  border-radius:1rem;
  width:100%;
  color:white;
  box-shadow: .2px 2px 12px rgba(0,0,0,.5);
  cursor:pointer;
}
#link-signUp{
  color:black;
}
.p-dont{
  padding-top:20px;
  color:#3338
}
</style>
<form action="http://localhost/steed/admin_steed/check_login" method="post" enctype="multipart/form-data">
  <h2>Welcome</h2>
  <div class="input-group">
    <input type="text" id="username" name="phone" required>
    <label for="username">Phone</label>
  </div>
    <div class="input-group">
    <input type="password" id="password" name="password" required>
    <label for="password">PassWord</label>
  </div>
  <button type="submit" class="btn-logn-in">Login</button>
  <p class="p-dont">Only admins can create accounts</p>
</form>
