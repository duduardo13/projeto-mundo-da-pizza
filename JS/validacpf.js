/*Código pra validar o CPF, ou seja não entrarem com cpf falso no site */ 
function TestaCPF(strCPF) {
				var Soma;
				var Resto;
				Soma = 0;
				
				if (strCPF == "00000000000") return "CPF INVÁLIDO";
				 
				for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
			  
				Resto = (Soma * 10) % 11;
			   
				if ((Resto == 10) || (Resto == 11))  Resto = 0;
				
				if (Resto != parseInt(strCPF.substring(9, 10)) ) return "CPF INVÁLIDO";
			   
				Soma = 0;
				
				for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
				
				Resto = (Soma * 10) % 11;
			   
				if ((Resto == 10) || (Resto == 11))  Resto = 0;
				
				if (Resto != parseInt(strCPF.substring(10, 11) ) ) return "CPF INVÁLIDO";
				
				return "CPF VÁLIDO";
			}
			
			