var totalquestions=11

var correctchoices=new Array()
	correctchoices[1]='a' 
	correctchoices[2]='a' 
	correctchoices[3]='d'
	correctchoices[4]='a'
	correctchoices[5]='d'
	correctchoices[6]='d'
	correctchoices[7]='a'
	correctchoices[8]='c'
	correctchoices[9]='d'
	correctchoices[10]='d'
	correctchoices[11]='b' 


	function gradeit(){
		var incorrect=null
			for (q=1;q<=totalquestions;q++){
				var thequestion=eval("document.myquiz.question"+q)
					for (c=0;c<thequestion.length;c++){
						if (thequestion[c].checked==true)
							actualchoices[q]=thequestion[c].value
					}

				if (actualchoices[q]!=correctchoices[q]){ 
					if (incorrect==null)
						incorrect=q
					else
						incorrect+="/"+q
				}
			}

		if (incorrect==null)
			incorrect="a/b"
				document.cookie='q='+incorrect
				if (document.cookie=='')
					alert("Your browser does not accept cookies. Please adjust your browser settings.")
				else
					window.location="results.htm"
	}


function showsolution(){
	var win2=window.open("","win2","width=200,height=350, scrollbars")
		win2.focus()
		win2.document.open()
		win2.document.write('<title>Solution</title>')
		win2.document.write('<body bgcolor="#FFFFFF">')
		win2.document.write('<center><h3>Solution to Quiz</h3></center>')
		win2.document.write('<center><font face="Arial">')
		for (i=1;i<=totalquestions;i++){
			for (temp=0;temp<incorrect.length;temp++){
				if (i==incorrect[temp])
					wrong=1
			}
			if (wrong==1){
				win2.document.write("Question "+i+"="+correctchoices[i].fontcolor("red")+"<br>")
					wrong=0
			}
			else
				win2.document.write("Question "+i+"="+correctchoices[i]+"<br>")
		}
	win2.document.write('</center></font>')
		win2.document.write("<h5>Note: The solutions in red are the ones to the questions you had incorrectly answered.</h5>")
		win2.document.close()
}
