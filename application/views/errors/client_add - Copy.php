<?php include_once('templates/header.php');?>

    <!-- BEGIN Content -->
    <div id="main-content">
        <!-- BEGIN Page Title -->
        <div class="page-title">
            <div>
                <h1><i class="fa fa-file-o"></i> Dashboard</h1>
                <h4>Overview, stats, chat and more</h4>
            </div>
        </div>
        <!-- END Page Title -->

        <!-- BEGIN Breadcrumb -->
        <div id="breadcrumbs">
            <ul class="breadcrumb">
                <li class="active"><i class="fa fa-home"></i> Home</li>
            </ul>
        </div>
        <!-- END Breadcrumb -->

        <!-- BEGIN Main Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-title">
                        <h3><i class="fa fa-bars"></i> Input Types</h3>

                        <div class="box-tool">
                            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form action="#" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Input</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <input type="text" class="form-control"/>
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Password</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <input type="password" class="form-control" data-action="pwindicator"
                                           data-indicator="pwindicator-block"/>
                                    <span class="help-inline">Some hint here</span>

                                    <div class="pwindicator" id="pwindicator-block">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Email Address Input</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input class="form-control" type="text" placeholder="Email Address"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Disabled Input</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <input class="form-control" type="text" placeholder="Disabled input here..."
                                           disabled/>
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Readonly Input</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <input class="form-control" type="text" placeholder="Readonly input here..."
                                           disabled/>
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label class="col-sm-3 col-lg-2 control-label">Input with warning</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <input type="text" class="form-control"/>
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="form-group has-error">
                                <label class="col-sm-3 col-lg-2 control-label">Input with error</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <input type="text" class="form-control"/>
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>

                            <div class="form-group has-success">
                                <label class="col-sm-3 col-lg-2 control-label">Input with success</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <input type="text" class="form-control"/>
                                    <span class="help-inline">Some hint here</span>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Input with Popover</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <input type="text" class="form-control show-popover" data-trigger="hover"
                                           data-content="Popover body goes here. Popover body goes here."
                                           data-original-title="Popover header" data-placement="top"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Input with Tooltip</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <input type="text" class="form-control show-tooltip" data-trigger="hover"
                                           data-original-title="Tooltip text goes here"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Email Address Input</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-icon left">
                                        <i class="fa fa-envelope"></i>
                                        <input class="form-control" type="text" placeholder="Email Address"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Currency Input</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input class="form-control" type="text"/>
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Prepended inputs</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input class="form-control" type="text" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Appended icon</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <input type="text" placeholder="Secret key" class="form-control">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Appended inputs</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <input type="text" placeholder="Price" class="form-control">
                                        <span class="input-group-addon">$</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Prepended and appended input</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" placeholder="XX" class="form-control">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Input with button</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <input type="text" placeholder="..." class="form-control">
<span class="input-group-btn">
<button class="btn btn-primary" type="button">Go!</button>
</span>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"></label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input type="text" placeholder="Search here..." class="form-control"/>
<span class="input-group-btn">
<button class="btn" type="button">Search!</button>
</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"></label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input type="text" placeholder="Search here..." class="form-control">
<span class="input-group-btn">
<button class="btn btn-inverse" type="button">Search</button>
</span>
<span class="input-group-btn">
<button class="btn btn-danger" type="button">Back</button>
</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"></label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                                        <input type="text" placeholder="New things.." class="form-control">
<span class="input-group-btn">
<button class="btn" type="button">Save!</button>
</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Even more buttons..</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
<span class="input-group-btn">
<button class="btn" type="button">Left</button>
</span>
                                        <input type="text" placeholder="Which side?" class="form-control">
<span class="input-group-btn">
<button class="btn" type="button">Right</button>
</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Input with dropdown</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                Action
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#">Some action</a>
                                                </li>
                                                <li>
                                                    <a href="#">Another action</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"></label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
<span class="input-group-btn">
<button class="btn">Check</button>
</span>
                                        <input class="form-control" type="text">

                                        <div class="input-group-btn">
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                Action
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="#">Some action</a>
                                                </li>
                                                <li>
                                                    <a href="#">Another action</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Segmented dropdown</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <div class="input-group">
                                        <input class="form-control" type="text">

                                        <div class="input-group-btn">
                                            <button class="btn">First</button>
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="#">Some action</a>
                                                </li>
                                                <li>
                                                    <a href="#">Another action</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Default Dropdown</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">Select...</option>
                                        <option value="Category 1">Category 1</option>
                                        <option value="Category 2">Category 2</option>
                                        <option value="Category 3">Category 5</option>
                                        <option value="Category 4">Category 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Default Dropdown(Multiple)</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control" multiple="multiple"
                                            data-placeholder="Choose a Category" tabindex="1">
                                        <option value="Category 1">Category 1</option>
                                        <option value="Category 2">Category 2</option>
                                        <option value="Category 3">Category 5</option>
                                        <option value="Category 4">Category 4</option>
                                        <option value="Category 5">Category 6</option>
                                        <option value="Category 6">Category 7</option>
                                        <option value="Category 7">Category 8</option>
                                        <option value="Category 8">Category 9</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Custom Dropdown</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control chosen" data-placeholder="Choose a Category"
                                            tabindex="1">
                                        <option value=""></option>
                                        <option value="Category 1">Category 1</option>
                                        <option value="Category 2">Category 2</option>
                                        <option value="Category 3">Category 5</option>
                                        <option value="Category 4">Category 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Custom Dropdown</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control chosen" data-placeholder="Choose a Category"
                                            tabindex="1">
                                        <option value=""></option>
                                        <option value="Category 1">Category 1</option>
                                        <option value="Category 2">Category 2</option>
                                        <option value="Category 3">Category 5</option>
                                        <option value="Category 4">Category 4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Grouped Custom Dropdown</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <select data-placeholder="Your Favorite Football Team" class="form-control chosen"
                                            tabindex="-1" id="selS0V">
                                        <option value=""></option>
                                        <optgroup label="NFC EAST">
                                            <option>Dallas Cowboys</option>
                                            <option>New York Giants</option>
                                            <option>Philadelphia Eagles</option>
                                            <option>Washington Redskins</option>
                                        </optgroup>
                                        <optgroup label="NFC NORTH">
                                            <option>Chicago Bears</option>
                                            <option>Detroit Lions</option>
                                            <option>Green Bay Packers</option>
                                            <option>Minnesota Vikings</option>
                                        </optgroup>
                                        <optgroup label="NFC SOUTH">
                                            <option>Atlanta Falcons</option>
                                            <option>Carolina Panthers</option>
                                            <option>New Orleans Saints</option>
                                            <option>Tampa Bay Buccaneers</option>
                                        </optgroup>
                                        <optgroup label="NFC WEST">
                                            <option>Arizona Cardinals</option>
                                            <option>St. Louis Rams</option>
                                            <option>San Francisco 49ers</option>
                                            <option>Seattle Seahawks</option>
                                        </optgroup>
                                        <optgroup label="AFC EAST">
                                            <option>Buffalo Bills</option>
                                            <option>Miami Dolphins</option>
                                            <option>New England Patriots</option>
                                            <option>New York Jets</option>
                                        </optgroup>
                                        <optgroup label="AFC NORTH">
                                            <option>Baltimore Ravens</option>
                                            <option>Cincinnati Bengals</option>
                                            <option>Cleveland Browns</option>
                                            <option>Pittsburgh Steelers</option>
                                        </optgroup>
                                        <optgroup label="AFC SOUTH">
                                            <option>Houston Texans</option>
                                            <option>Indianapolis Colts</option>
                                            <option>Jacksonville Jaguars</option>
                                            <option>Tennessee Titans</option>
                                        </optgroup>
                                        <optgroup label="AFC WEST">
                                            <option>Denver Broncos</option>
                                            <option>Kansas City Chiefs</option>
                                            <option>Oakland Raiders</option>
                                            <option>San Diego Chargers</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Custom Dropdown Multiple Select</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <select data-placeholder="Your Favorite Football Teams" class="form-control chosen"
                                            multiple="multiple" tabindex="6">
                                        <option value=""></option>
                                        <optgroup label="NFC EAST">
                                            <option>Dallas Cowboys</option>
                                            <option>New York Giants</option>
                                            <option>Philadelphia Eagles</option>
                                            <option>Washington Redskins</option>
                                        </optgroup>
                                        <optgroup label="NFC NORTH">
                                            <option selected>Chicago Bears</option>
                                            <option>Detroit Lions</option>
                                            <option>Green Bay Packers</option>
                                            <option>Minnesota Vikings</option>
                                        </optgroup>
                                        <optgroup label="NFC SOUTH">
                                            <option selected>Atlanta Falcons</option>
                                            <option>Carolina Panthers</option>
                                            <option>New Orleans Saints</option>
                                            <option>Tampa Bay Buccaneers</option>
                                        </optgroup>
                                        <optgroup label="NFC WEST">
                                            <option>Arizona Cardinals</option>
                                            <option>St. Louis Rams</option>
                                            <option>San Francisco 49ers</option>
                                            <option>Seattle Seahawks</option>
                                        </optgroup>
                                        <optgroup label="AFC EAST">
                                            <option>Buffalo Bills</option>
                                            <option>Miami Dolphins</option>
                                            <option>New England Patriots</option>
                                            <option>New York Jets</option>
                                        </optgroup>
                                        <optgroup label="AFC NORTH">
                                            <option>Baltimore Ravens</option>
                                            <option>Cincinnati Bengals</option>
                                            <option>Cleveland Browns</option>
                                            <option>Pittsburgh Steelers</option>
                                        </optgroup>
                                        <optgroup label="AFC SOUTH">
                                            <option>Houston Texans</option>
                                            <option>Indianapolis Colts</option>
                                            <option>Jacksonville Jaguars</option>
                                            <option>Tennessee Titans</option>
                                        </optgroup>
                                        <optgroup label="AFC WEST">
                                            <option>Denver Broncos</option>
                                            <option>Kansas City Chiefs</option>
                                            <option>Oakland Raiders</option>
                                            <option>San Diego Chargers</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Custom Dropdown Diselect</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <select data-placeholder="Your Favorite Type of Bear"
                                            class="form-control chosen-with-diselect" tabindex="-1" id="selCSI">
                                        <option value=""></option>
                                        <option>American Black Bear</option>
                                        <option>Asiatic Black Bear</option>
                                        <option>Brown Bear</option>
                                        <option>Giant Panda</option>
                                        <option selected="">Sloth Bear</option>
                                        <option>Sun Bear</option>
                                        <option>Polar Bear</option>
                                        <option>Spectacled Bear</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Radio Buttons</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios1" value="option1"/> Option 1
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios1" value="option2" checked/> Option 2
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios1" value="option2"/> Option 3
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Radio Buttons</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadios2" value="option1"/> Option 1
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadios2" value="option2" checked/> Option 2
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadios2" value="option2"/> Option 3
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Checkbox</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <label class="checkbox">
                                        <input type="checkbox" value=""/> Checkbox 1
                                    </label>
                                    <label class="checkbox">
                                        <input type="checkbox" value=""/> Checkbox 2
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Checkbox</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value=""/> Checkbox 1
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value=""/> Checkbox 2
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Textarea</label>

                                <div class="col-sm-9 col-lg-10 controls">
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save
                                    </button>
                                    <button type="button" class="btn">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Main Content -->

        <footer>
            <p>2016 © Client Management System </p>
        </footer>

        <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- END Content -->
    
<?php include_once('templates/footer.php');?>