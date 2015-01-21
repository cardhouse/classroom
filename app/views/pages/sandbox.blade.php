<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    {{ HTML::style('/css/datepicker.css') }}
    {{ HTML::script('/javascript/bootstrap-datepicker.js') }}
    <style>
        body {
            margin-top: 70px;
        }
    </style>
</head>
<body>
    <div class="box container">
        <header>
            <h2>A lot of generic stuff</h2>
        </header>
        <section>
            <header>
                <h3>Paragraph</h3>
                <p>This is the subtitle for this particular heading</p>
            </header>
            <p>Phasellus nisl nisl, varius id <sup>porttitor sed pellentesque</sup> ac orci. Pellentesque
                habitant <strong>strong</strong> tristique <b>bold</b> et netus <i>italic</i> malesuada <em>emphasized</em> ac turpis egestas. Morbi
                leo suscipit ut. Praesent <sub>id turpis vitae</sub> turpis pretium ultricies. Vestibulum sit
                amet risus elit.</p>
        </section>
        <section>
            <header>
                <h3>Blockquote</h3>
            </header>
            <blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget.
                tempus euismod. Vestibulum ante ipsum primis in faucibus.</blockquote>
        </section>
        <section>
            <header>
                <h3>Divider</h3>
            </header>
            <p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra
                ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci
                facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam
                tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                posuere cubilia.</p>
            <hr />
            <p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra
                ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci
                facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam
                tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                posuere cubilia.</p>
        </section>
        <section>
            <header>
                <h3>Unordered List</h3>
            </header>
            <ul class="default">
                <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
            </ul>
        </section>
        <section>
            <header>
                <h3>Ordered List</h3>
            </header>
            <ol class="default">
                <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
                <li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
            </ol>
        </section>
        <section>
            <header>
                <h3>Table</h3>
            </header>
            <div class="table-wrapper">
                <table class="default">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>45815</td>
                        <td>Something</td>
                        <td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
                        <td>29.99</td>
                    </tr>
                    <tr>
                        <td>24524</td>
                        <td>Nothing</td>
                        <td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
                        <td>19.99</td>
                    </tr>
                    <tr>
                        <td>45815</td>
                        <td>Something</td>
                        <td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
                        <td>29.99</td>
                    </tr>
                    <tr>
                        <td>24524</td>
                        <td>Nothing</td>
                        <td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
                        <td>19.99</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td>100.00</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </section>
        <section>
            <header>
                <h3>Form</h3>
            </header>
            <form method="post" action="#">
                <div class="row">
                    <div class="6u">
                        <label for="name">Name</label>
                        <input class="text" type="text" name="name" id="name" value="" placeholder="John Doe" />
                    </div>
                    <div class="6u">
                        <label for="email">Email</label>
                        <input class="text" type="text" name="email" id="email" value="" placeholder="johndoe@domain.tld" />
                    </div>
                </div>
                <div class="row">
                    <div class="12u">
                        <label for="subject">Subject</label>
                        <input class="text" type="text" name="subject" id="subject" value="" placeholder="Enter your subject" />
                    </div>
                </div>
                <div class="row">
                    <div class="12u">
                        <label for="subject">Message</label>
                        <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="12u">
                        <ul class="actions">
                            <li><input type="submit" value="Send" /></li>
                            <li><input type="reset" value="Reset" class="alt" /></li>
                        </ul>
                    </div>
                </div>
            </form>
        </section>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    {{ HTML::script('/javascript/bootstrap-datepicker.js') }}
    <script>$('#flash-overlay-modal').modal();</script>
    <script>
        $('.input-append.date').datepicker({
            format: "MM dd, yyyy",
            autoclose: true,
            todayHighlight: true
        });
    </script>
</body>
</html>
