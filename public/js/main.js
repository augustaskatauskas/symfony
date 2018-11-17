const articles = document.getElementById('articles');
const Cars = document.getElementById('Cars');
const Phones = document.getElementById('Phones');
const Computers = document.getElementById('Computers');

if (articles)
{
    articles.addEventListener('click',e =>{
        if(e.target.className === 'btn btn-danger delete-article')
        {
            if(confirm('Are you sure?'))
            {
                const id = e.target.getAttribute('data-id');
                
                fetch(`/article/delete/${id}`,{
                    method:'DELETE'
                }
                ).then(res => window.location.reload());
            }
        }
    });
}
    if (Cars)
{
    Cars.addEventListener('click',e =>{
        if(e.target.className === 'btn btn-danger delete-Car')
        {
            if(confirm('Are you sure?'))
            {
                const id = e.target.getAttribute('data-id');
                
                fetch(`/Car/delete/${id}`,{
                    method:'DELETE'
                }
                ).then(res => window.location.reload());
            }
        }
    });
  
}
if (Phones)
{
    Phones.addEventListener('click',e =>{
        if(e.target.className === 'btn btn-danger delete-Phone')
        {
            if(confirm('Are you sure?'))
            {
                const id = e.target.getAttribute('data-id');
                
                fetch(`/Phone/delete/${id}`,{
                    method:'DELETE'
                }
                ).then(res => window.location.reload());
            }
        }
    });
  
}
if (Computers)
{
    Computers.addEventListener('click',e =>{
        if(e.target.className === 'btn btn-danger delete-Computer')
        {
            if(confirm('Are you sure?'))
            {
                const id = e.target.getAttribute('data-id');
                
                fetch(`/Computer/delete/${id}`,{
                    method:'DELETE'
                }
                ).then(res => window.location.reload());
            }
        }
    });
  
}