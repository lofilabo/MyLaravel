Enter New Password Here.
<form method='get' action="{{ url($page_ref_url) }}/pwdresetexe">
	<input type=hidden name=guid value={{$guid}}>
	New Password:<input type='text' name='newpwd'/>
	<input type=submit>
</form>	