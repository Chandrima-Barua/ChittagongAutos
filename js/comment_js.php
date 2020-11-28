<?php
global $final;
?>

<script>

    $(document).ready(function () {
        var objects = <?php echo json_encode($final); ?>;

        var maximum = null;
        reply_to = 0;
        $(".add_comment tbody ").on("click", "tr", function (event) {
        // $(".add_comment ").on("click", "tr  td  input" ,function (event) {
            console.log(objects);

            reply_to = parseInt($(this).attr('number'));
            console.log(reply_to);


            add_name = '@' + $(this).attr('commenter');
            $('#com').val(add_name);

            reply_count = parseInt($(this).attr("total"));

            total_reply = reply_count + 1;


            $(this).attr('total', total_reply);
            new_total = parseInt($(this).attr("total"));
            console.log(new_total);

        });


        $(".submit").click(function () {
            console.log(objects);
            $("[id^=replyto_").parent().parent().parent().children().each(function () {

                var value = parseInt($(this).attr('number'));

                maximum = (value > maximum) ? value : maximum;
            });

            if (isNaN(maximum)) {
                var total = 1;
                console.log(maximum);
                console.log("if" + total);
            } else {
                var total = maximum + 1;

                console.log("else" + total);
            }

            var name = $('#name').val();
            console.log(name);
            var comment = $('#com').val();
            console.log(comment);
            var time = new Date();
            var update_time = time.toLocaleString('en-BD', {hour: 'numeric', minute: 'numeric', hour12: true});
            if ($('#name').val() == '' || $('#com').val() == '') {
                $(".submit").attr("disabled", true);

            } else {
                console.log(reply_to);
                $strings = "<tr id=top_" + total + "  number=" + total + "   commenter=" + name + "  ><td>" + total + "</td><td>" + name + "</td><td>" + update_time + "</td><td>" + comment + "</td><td>" + "<input type='button' value='[Reply]'  id=replyto_" + reply_to + " commenter=" + name + "   style=' color: #364d73;'>" + "</td></tr>";

                if (reply_to == 0) {

                    $('.add_comment').children().children().last().after($strings);

                } else {
                    console.log("updated");
                    let com_index = objects.findIndex((item) => item.commentnumber === reply_to);
                    console.log(com_index);

                    objects[com_index]['total_reply'] = new_total;
                    var sorted = Object.values(objects);

                    sorted.sort(function (a, b) {

                        var avalue = a.total_reply;
                        bvalue = b.total_reply;
                        if (avalue > bvalue) {
                            return -1;
                        } else if (bvalue > avalue) {
                            return 1;
                        } else {
                            return 0;
                        }
                    });
                    var after_update = [];
                    for (i = 0; i < Object.keys(sorted).length; i++) {
                        after_update.push(sorted[i]);

                    }

                    console.log(after_update);

                    let current = after_update.findIndex((item) => item.commentnumber === reply_to);
                    console.log(current);
                    next = current + 1;
                    console.log(next);

                    next_id = after_update[next]['commentnumber'];
                    console.log(next_id);

                    moved_id = after_update[current]['commentnumber'];

                    console.log($("#top_" + moved_id));
                    console.log($("#top_" + next_id));
                    wraper = $("#top_" + moved_id).detach();
                    $("#top_" + next_id).before(wraper);

                    $('.add_comment').children().children().last().after($strings);

                }


            }


            parseInt($("[id^=replyto_" + reply_to).parent().parent().parent().children().last().val(total));

            $.ajax({
                type: 'POST',
                url: 'comment-add.php',
                dataType: 'json',
                data: {comment: comment, name: name, update_time: update_time, reply_to: reply_to},
                success: function (data) {
                    console.log(reply_to);
                }
            });
            $('#name').val('');
            $('#com').val('');
            reply_to = 0;


        });


    });
</script>