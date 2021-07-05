<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoomsQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservation of hotel room';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="rooms-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <form action="/frontend/web/booking/save" id="booking-form" method="post">

        <label for="fullname"> Full Name </label>
        <input id="fullname" class="form-control" type="text" name="user_name" value="Jordan Peterson"
               title="Please enter your full name">

        <label for="email"> Email </label>
        <input id="email" class="form-control" type="text" name="email" value="JordanPeterson@gmail.com"
               title="Please enter your email">

        <label for="date_in">Date and time of arrival </label>
        <input id="date_in" class="form-control" type="text" name="date_in" value="<?= $today; ?>" titile="date and time of your arrival to the hotel room">

        <label for="date_out"> Checkout date and time </label>
        <input id="date_out" class="form-control" type="text" name="date_out" value="<?= $today; ?>" title="checking-out date and time, must be different from time of arrival">

        <input class="form-control" type="hidden" name="room_id" value="">

    </form>

    <br>

    <div class="room-variants"></div>

    <a href="javascript:" class="btn btn-primary btn-save">Book now</a>

    <p class="hint" title="Измените дату выезда выше, затем нажмите 'Забронировать', появиться выбор свободных номеров, для выбора кликнете по нужному,
  затем нажмите 'Забронировать' еще раз.">
        Change date and time above in check-out field, then click on button 'Book now', room options will appear, click
        desired room type and then hit 'Book now', to confirm the booking.
    </p>

</div>

<style>
    .hint {
        margin: 7px;
        width: 30%;
        height: 110px;
        border-radius: 9px;
        background: lightblue;
        font-size: 15px;
        padding: 10px;

        text-align: center;
    }

    .room-variants {
    }

    .room-variants a {
        display: block;
        padding: 7px;
        margin: 5px;
    }

    .room-variants a.selected {
        font-weight: bold;
        color: lightgreen;
    }

    label {
        vertical-align: middle;
        color: cornflowerblue;
    }

    .form-control {
        width: 30%;
    }

</style>

<script>

    document.addEventListener('DOMContentLoaded', function (e) {
        ready()
    })

    var ready = function () {

        $('input').on('change', function (e) {
            let dateIn = $('[name=date_in]').val()
            let $variants = $('.room-variants')

            $.post('/frontend/web/booking/get-categories', {date_in: dateIn})
                .done(function (r) {
                    // [{"title":"Одноместный ","id":"1","cnt":"1"},{"title":"Люкс","id":"4","cnt":"2"},{"title":"Де-Люкc","id":"6","cnt":"5"},{"title":" Двуместный ","id":"11","cnt":"4"}]
                    $variants.empty()
                    if (!r.length) {
                        $variants.text('Нет свободных номеров на эти даты')
                        return
                    }

                    r.forEach(function (item, idx) {
                        $(`<a href='javascript:;' data-variant data-room-id="${item.id}">${item.title} (${item.cnt})</a>`).appendTo($variants)
                    })

                    console.log(r)
                })
        })

        $(document).on('click', '[data-variant]', function (e) {
            $('[data-variant]').removeClass('selected')
            $(this).addClass('selected')
            let roomId = $(this).data('room-id')
            $('[name=room_id]').val(roomId)/booking/get-categories
        })

        $('.btn-save').click(function (e) {
            let $form = $('#booking-form')
            $.post($form.attr('action'), $form.serialize())
                .done(r => {
                    if (typeof r.success != 'undefined') {
                        $('.hint')[0].innerText = 'Success, page will reload in a few seconds;';
                        $('.hint')[0].style = 'height:40px;background:lightgreen;color:white;';
                        setTimeout(() => {
                            document.location.reload()
                        }, 9000);

                    }
                    else {
                        $('.hint')[0].innerText = 'Failure, check data you entered in fields above;';
                        $('.hint')[0].style = 'height:40px;background:red;color:white;';
                    }

                })
        })


    }

</script>