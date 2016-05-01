<?php
$pageTitle = 'Projects';
include('./templates/header.html');
$array = array("http://www.panamb-1078.appspot.com/", "https://github.com/nkowdley/1632-Deliverable1", "https://github.com/MeSz/CS1632_Project2_CoffeeMakerQuestUnitTesting", "https://github.com/dms163/CS1632-Deliverable-3", "https://github.com/dms163/CS1632-Deliverable4", "https://github.com/dms163/SlowLifeGUI", "https://github.com/nkowdley/rusty_coffee_maker_quest");
?>


<div id="content">
    <p id="headerinfo">
       I have completed many projects in my career but here is my most recent course work:
    </p>
    <dl>
        <dt><a href="<?php echo $array[0] ?>" id="centered">Panamb</a></dt>
        <dd>Panamb was a website my friends and I built for a class project in the fall of 2015. It features the ability to stream music which was a great challenge.</dd>
        <br>
        <dt><a href="<?php echo $array[1] ?>" id="Panchor">CS1632 Deliverable1</a></dt>
        <dd>The first deliverable in CS1632 which was a project where we were supposed to hand test a program which takes a lot of time.</dd>
        <br>
        <dt><a href="<?php echo $array[2] ?>" id="Panchor">CS1632 Deliverable2</a></dt>
        <dd>The second deliverable involved creating unit tests and doing automated testing using JUnit and Mockito. </dd>
        <br>
        <dt><a href="<?php echo $array[3] ?>" id="Panchor">CS1632 Deliverable3</a></dt>
        <dd>The third deliverable which used selenium to test websites. We chose to test <a href="http://wikirby.com/wiki/Kirby_Wiki">Wikirby</a>.</dd>
        <br>
        <dt><a href="<?php echo $array[4]?>" id="Panchor">CS1632 Deliverable4</a> </dt>
        <dd>The fourth deliverable utilized property based testing on Java's Arrays class. </dd>
        <br>
        <dt><a href="<?php echo $array[5]?>" id="Panchor">CS1632 SlowLifeGUI</a> </dt>
        <dd>The fifth deliverable demonstrated performance testing. </dd>
        <br>
        <dt><a href="<?php echo $array[6]?>" id="Panchor">CS1632 RustyCoffeeMakerQuest</a></dt>
        <dd>The sixth deliverable is my favorite project from Software Testing. The deliverable gave us a lot of freedom to utilize any language we desired. My partner and I chose to remake a program called CofeeMakerQuest using the up and coming systems language Rust.</dd>
    </dl>

</div>
<?php
include('./templates/footer.html');
?>
