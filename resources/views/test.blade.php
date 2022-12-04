<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="blogs">

    </div>
    <div>
        <ul id="pagination">

        </ul>
    </div>
    <script>
        const getData = url => {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                     
                        const blogs = data.data;
                        const blog = document.getElementById("blogs");
                        blog.innerHTML = "";
                        const pagination = document.getElementById("pagination");
                        pagination.innerHTML = "";
                        blogs.forEach(db => {
                            blog.innerHTML += `<p> ${db.title} </p>`
                        })
                        const paginationLinks = data.links;
                        console.log(paginationLinks);
                        paginationLinks.forEach(link => {
                            pagination.innerHTML += `<li><a onclick="getData('${link.url}')">${link.label}<a></li>`
                        })
                })
        }
        fetch("/api/blogs")
            .then(response => {
                return response.json();
            })
            .then(data => {
                
                const blogs = data.data;
                const blog = document.getElementById("blogs");
                const pagination = document.getElementById("pagination");
                blogs.forEach(db => {
                    blog.innerHTML += `<p> ${db.title} </p>`
                })
                const paginationLinks = data.links;
                console.log(paginationLinks);
                paginationLinks.forEach(link => {
                    pagination.innerHTML += `<li><a onclick="getData('${link.url}')">${link.label}<a></li>`
                })
            })
    </script>
</body>
</html>