function fetchState(postcode){

    fetch("http://localhost/direct-lending/api/v1/single_state.php?postcode="+postcode).then((postcode)=>{

    return postcode.json();    

    }).then((objectData)=>{
        if(Object.entries(objectData).length===0){
            document.getElementById("state").value = "Invalid Postcode";
            console.log('Inavlid Postcode');
        } else {
            document.getElementById("state").value = objectData[0].state;
            
        }
          
    }).catch((error)=>{
        console.log(error);
    })

}


//objectData[0].state==""