function GiveTime () {
	var hora = new Date()
	var hoy = new Date();
	document.write(hoy.getYear()+"-"+hoy.getMonth()+"-"+hoy.getDate()+" "+hora.getHours()+":"+hora.getMinutes+":00");
  }