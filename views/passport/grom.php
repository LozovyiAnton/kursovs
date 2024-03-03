<?php if (isset($_SESSION['user'])) : ?>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Заявка на отримання паспорту</h4>
            <p class="card-description"> Вводьте коректні дані </p>
            <form class="forms-sample" method="post">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Surname</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="surname" placeholder="Surname">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">По батькові</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="pb" placeholder="По батькові">
                </div>
                <div class="form-group">
                    <label for="exampleSelectGender">Gender</label>
                    <select class="form-control" name="sex" id="exampleSelectGender">
                        <option value="Чоловік">Чоловік</option>
                        <option value="Жінка">Жінка</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                    <div class="col-sm-9">
                        <input class="form-control" name="date_of_birth" placeholder="yyyy-mm-dd">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Photo link</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="img" placeholder="Photo link">
                </div>
                <input type="submit" name="submit" value="Подати заявку" class="btn btn-primary mr-2">
            </form>
        </div>
    </div>
<? else : ?>
    <h2>Ввійдіть в акаунт</h2>
<? endif; ?>