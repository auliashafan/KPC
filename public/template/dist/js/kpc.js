$(document).ready(function(){
    //AJAX INITIATE
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".view_request").on("click", function () {
        var id = $(this).data("value");
        var status = $(this).data("status");
        $.ajax({
            type:'POST',
            url:'/ajax/view_request',
            data:{
                id: id
            },
            success:function(data){
                var response = JSON.parse(data);
                console.log(response);
                $("#requestby").text(response[0]["name"])
                $("#badgeid").text(response[0]["id"])
                $("#dateofrequest").text(response[0]["daterequest"])
                $("#title").text(response[0]["applicationtitle"])
                $("#details").html(response[0]["request_text"])
                $("#Modal").modal("show")
                $(".approve").data("value", response["request_id"]);
                $(".development").data("value", response["request_id"]);
                $(".development").data("status", status);
                $(".revision").attr("href",'/request/revision/view/'+id);

                if(status == "Development"){
                    $(".development").show();
                    $(".revision").show();
                    $(".development").text("Done");
                }else if(status == "Done"){
                    $(".development").hide();
                    $(".revision").hide();
                    $(".approve").hide();
                }else{
                    $(".development").show();
                    $(".revision").show();
                    $(".approve").show();
                    $(".development").text("Start Development")
                }
            }
        });
    })

    $(".approve").on("click", function () {
        var id = $(this).data("value");
        $.ajax({
            type:'POST',
            url:'/ajax/update_request',
            data:{
                id: id
            },
            success:function(data){
                var response = JSON.parse(data);
                console.log(response);
                location.reload(true);
            }
        });
    })

    $(".development").on("click", function () {
        var id = $(this).data("value");
        var status = $(this).data("status");
        if(status == "Development"){
            $.ajax({
                type:'POST',
                url:'/ajax/update_request_done',
                data:{
                    id: id
                },
                success:function(data){
                    var response = JSON.parse(data);
                    console.log(response);
                    location.reload(true);
                }
            });
        }else{
            $.ajax({
                type:'POST',
                url:'/ajax/update_request_development',
                data:{
                    id: id
                },
                success:function(data){
                    var response = JSON.parse(data);
                    console.log(response);
                    location.reload(true);
                }
            });
        }
    })

    $(".delete-user").on("click", function () {
        var id = $(this).data("value");
        $.ajax({
            type:'POST',
            url:'/ajax/delete_user',
            data:{
                id: id
            },
            success:function(data){
                console.log(data);
                location.reload(true);
            }
        });
    })
})