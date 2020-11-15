window.onload=function(){
    let country_search=document.getElementById('lookup_countries')
    let city_search=document.getElementById('lookup_cities')
    let request=new XMLHttpRequest()
    let result=document.getElementById('result')
    let query=document.getElementById('country')

    if (query==""){
        let url= "world.php?all"
        request.open('GET',url)
        request.send()

    }
    
    country_search.onclick=function(){
        let search=document.getElementById("country").value
        let url= 'world.php?country='+search+"&context=country"
        request.open('GET',url)
        request.send()
        request.onload=function(){
            if(this.readyState==4 && this.status==200){
                result.innerHTML=this.responseText
            }

        }


    }
    city_search.onclick=function(){
        let search=document.getElementById("country").value
        let url= 'world.php?country='+search+"&context=cities"
        request.open('GET',url)
        request.send()
        request.onload=function(){
            if(this.readyState==4 && this.status==200){
                result.innerHTML=this.responseText
            }

        }

    }
}