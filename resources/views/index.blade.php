<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Обновление каталога</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
        <script type="text/javascript" src="js/config_form.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="col-md-offset-2 col-md-8 content">
            <h1>Обновление каталога</h1>
            <div class="columns">
                <form method="POST" enctype="multipart/form-data"  id="parser_config_form" name="parser_config" action>
                    <h2>Порядок столбцов</h2>
                    <p>Приведите порядок столбцов в соответствие с вашим прайс-листом. Столбцы можно перетаскивать с помощью мыши. Если в вашем прайс-листе нет какого-либо столбца, его можно удалить с помощью крестика.<br>
                        Для того чтобы изменить количество столбцов с категориями и подкатегориями товаров, используйте настройку "Уровень вложенности".
                    </p>
                    <span>Уровень вложенности:</span>
                    <select class="cont-input cont-btn" name="parser_config[parser_price_subcategory]" id="parser_config_parser_price_subcategory">
                        <option value="1" selected="selected">Только категории</option>
                        <option value="2">Категории с подразделами</option>
                        <option value="3">Подразделы с подразделами</option>
                    </select>
                    <div>
                        <div class="cont-input for-catalogue__parser">
                            <table class="catalogue__parser_wrap">
                                <tr class="first-row">
                                    <td class="empty-char">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    <td class="column-char column-category-char">
                                        A
                                    </td>
                                    <td class="column-char">
                                        B
                                    </td>
                                    <td class="column-char">
                                        C
                                    </td>
                                    <td class="column-char">
                                        D
                                    </td>
                                    <td class="column-char">
                                        E
                                    </td>
                                    <td class="column-char">
                                        F
                                    </td>
                                </tr>
                                <tr id="parser_cells">
                                    <td id="parser_config_parser_price_first_column" class="first-column">
                                        <table class="fake-table">
                                            <tr>
                                                <td class="cell-name"> 1 </td>
                                            </tr>
                                            <tr>
                                                <td> 2 </td>
                                            </tr>
                                            <tr>
                                                <td> 3 </td>
                                            </tr>
                                            <tr>
                                                <td> 4 </td>
                                            </tr>
                                            <tr>
                                                <td> 5 </td>
                                            </tr>
                                            <tr>
                                                <td> 6 </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="catalogue__parser_cell catalogue__parser-item cell-category" name="category">
                                        <table class="catalogue__parser fake-table">
                                            <tr>
                                                <td class="cell-name">
                                                    <div  class="cell-name-block">
                                                        Категория
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="catalogue__parser_cell cell_item catalogue__parser-item" name="price">
                                        <table class="catalogue__parser fake-table">
                                            <tr>
                                                <td class="cell-name">
                                                    <div  class="cell-name-block">
                                                        Цена
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="catalogue__parser_cell cell_item catalogue__parser-item" name="vendor_code">
                                        <table class="catalogue__parser fake-table">
                                            <tr>
                                                <td class="cell-name">
                                                    <div  class="cell-name-block">
                                                        Артикул
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="catalogue__parser_cell cell_item catalogue__parser-item" name="title">
                                        <table class="catalogue__parser fake-table">
                                            <tr>
                                                <td class="cell-name">
                                                    <div  class="cell-name-block">
                                                        Название товара
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="catalogue__parser_cell cell_item catalogue__parser-item" name="announce">
                                        <table class="catalogue__parser fake-table">
                                            <tr>
                                                <td class="cell-name">
                                                    <div  class="cell-name-block">
                                                        Краткое описание
                                                        <a href="javascript: void(0);" class="cell_delete">
                                                        <img src="img/close.png" class="del" width="12" height="12" title="Удалить" alt="Удалить" />
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="catalogue__parser_cell cell_item catalogue__parser-item" name="features">
                                        <table class="catalogue__parser fake-table">
                                            <tr>
                                                <td class="cell-name">
                                                    <div  class="cell-name-block">
                                                        Характеристики
                                                        <a href="javascript: void(0);" class="cell_delete">
                                                        <img src="img/close.png" class="del" width="12" height="12" title="Удалить" alt="Удалить" />
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                            <tr>
                                                <td>  </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="parser_cells_deleted"cont-input>
                            <h2 class="subtitle">Добавить поля:</h2>
                            <div class="box">
                                <ul>
                                    <li><a href="javascript: void(0);" class="ajax cell_restore" name="description">Описание</a></li>
                                    <li><a href="javascript: void(0);" class="ajax cell_restore" name="weight">Вес</a></li>
                                    <li><a href="javascript: void(0);" class="ajax cell_restore" name="volume">Объём</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="load">
                        <h2>Добавьте фаил</h2>
                        @if( isset($resultParser))
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                Загружено <strong>{{$resultParser}} товара(ов)</strong>
                            </div>
                        @endif
                        <span>Фаил с товарами: <input type="file" name="parser_config[file]" id="parser_config_file"></span>
                        <input type="hidden" value="" name="parser_config[columns]" id="parser_config_columns" />
                        <button class="load__button" form="parser_config_form" type="submit">Загрузить</button>

                    </div>
                    {{ csrf_field() }}
                </form>
                </div>
            </div>
        </div>
        <table>
            <td class="catalogue__parser_cell cell_item catalogue__parser-item prototype">
                <table class="catalogue__parser fake-table">
                    <tr>
                        <td class="cell-name">
                            <div class="cell-name-block"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>  </td>
                    </tr>
                    <tr>
                        <td>  </td>
                    </tr>
                    <tr>
                        <td>  </td>
                    </tr>
                    <tr>
                        <td>  </td>
                    </tr>
                    <tr>
                        <td>  </td>
                    </tr>
                </table>
            </td>
        </table>
        <a href="javascript: void(0);" class="cell_delete prototype">
        <img src="img/close.png" class="del" width="12" height="12" title="Удалить" alt="Удалить" />
        </a>
    </body>
</html>