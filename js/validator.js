function Validator(options){
	function validate(inputElement,rule){
		var errorElement=inputElement.parentElement.querySelector(options.errorSelector);
		var errorMessage=rule.test(inputElement.value);
		if (errorMessage){
				errorElement.innerText=errorMessage;
				return false;
			//	inputElemet.parentElement.classList.add('invalid');
			} else {return true}
	}
	var formElement=document.querySelector(options.form);
	formElement.onsubmit=function(e){
        e.preventDefault() ;
	 	var formValid=true;
	 	options.rules.forEach(function(rule){
	 		var inputElement=formElement.querySelector(rule.selector);
	 		var valid=validate(inputElement,rule);
	 		if (valid==false) formValid=false;
	 	})
	 	if (formValid==true)  login()

	 }
	options.rules.forEach(function(rule){
		var inputElement=formElement.querySelector(rule.selector);

		var errorElement=inputElement.parentElement.querySelector(options.errorSelector);
		inputElement.onblur= function (){
			validate(inputElement,rule)
		}
		inputElement.oninput=function(){
				errorElement.innerText='';
			//	inputElemet.parentElement.classList.remove('invalid');
		}
	});

}
Validator.isRequired=function(selector,errmessage){
	return {
		selector:selector,
		test: function (value){
			return value.trim() ? undefined :errmessage;
		}
	};

}
Validator.minLength=function(selector,min){
	return {
		selector:selector,
		test: function (value){
			return value.trim().length>=min ? undefined :`Vui lòng nhập mật khẩu tối thiểu ${min} kí tự`;
		}
	};

}
Validator.isEmail=function(selector,errmessage){
	return {
		selector:selector,
		test: function (value){
			var regex=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			return regex.test(value)? undefined:errmessage;
		}
	};
}
Validator.isPhone=function(selector,errmessage){
	return {
		selector:selector,
		test: function (value){
			var regex= /^0\d{9,10}$/;

			return regex.test(value)? undefined:errmessage;
		}
	};
}

Validator.confirm=function(selector,password){
	return {
		selector:selector,
		test: function (value){

			return value===password() ?undefined:'Mật khẩu nhập lại không đúng'

		}
	};

}