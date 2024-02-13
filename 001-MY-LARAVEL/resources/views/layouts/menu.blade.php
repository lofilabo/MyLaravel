<?php
//dd(Auth::user()->name);
/*
@role('agent|admin')
    I am a agent!
@else
    I am not a agent...
@endrole


@role('agent|admin')
@endrole





<li class="nav-item">
    <a href="{{ route('lessons.index') }}"
       class="nav-link {{ Request::is('lessons') ? 'active' : '' }}">
        <p>Lessons</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('lessonsTwoCols.index') }}"
       class="nav-link {{ Request::is('lessonsTwoCols*') ? 'active' : '' }}">
        <p>Lessons[Nest]</p>
    </a>
</li>
*/
?>




<?php
/*
<li class="nav-item">
    <a href="{{ route('zzzpractices.index') }}"
       class="nav-link {{ Request::is('zzzpractices') ? 'active' : '' }}">
        <p>Test</p>
    </a>
</li>

*/
?>



<li class="nav-item">
    <a href="{{ route('zzzwibbles.index') }}"
       class="nav-link {{ Request::is('zzzwibbles') ? 'active' : '' }}">
        <p>Wibble</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('zzznibbles.index') }}"
       class="nav-link {{ Request::is('zzznibbles') ? 'active' : '' }}">
        <p>Nibble</p>
    </a>
</li>


@role('editor|admin|author')
<li class="nav-item">
    <a href="{{ route('lessonsadvs.index') }}"
       class="nav-link {{ Request::is('lessonsadvs') ? 'active' : '' }}">
        <p>Lessons</p>
    </a>
</li>
@endrole


@role('editor|admin|author')
<li class="nav-item">
    <a href="{{ route('articles.index') }}"
       class="nav-link {{ Request::is('articles*') ? 'active' : '' }}">
        <p>Articles</p>
    </a>
</li>
@endrole
@role('editor|admin')
<li class="nav-item">
    <a href="{{ route('articlecategories.index') }}"
       class="nav-link {{ Request::is('articlecategories*') ? 'active' : '' }}">
        <p>Article Categories</p>
    </a>
</li>
@endrole

@role('editor|admin')
  <li class="nav-item nav-link"><b>Lesson Tags</b></li>
  <li class="nav-item"><a href="{{ route('catDefAgeGroups.index') }}" class="nav-link {{ Request::is('catDefAgeGroups*') ? 'active' : '' }}"><p>&nbsp;&gt;&nbsp;Age Groups</p></a></li>
  <li class="nav-item"><a href="{{ route('catDefSubjects.index') }}" class="nav-link {{ Request::is('catDefSubjects*') ? 'active' : '' }}"><p>&nbsp;&gt;&nbsp;Subjects</p></a></li>
  <li class="nav-item"><a href="{{ route('catDefTopics.index') }}" class="nav-link {{ Request::is('catDefTopics*') ? 'active' : '' }}"><p>&nbsp;&gt;&nbsp;Topics</p></a></li>
  <li class="nav-item"><a href="{{ route('catDefConcepts.index') }}" class="nav-link {{ Request::is('catDefConcepts*') ? 'active' : '' }}"><p>&nbsp;&gt;&nbsp;Concepts</p></a></li>
@endrole

@role('admin')
<li class="nav-item">
    <a href="{{ route('employers.create') }}"
       class="nav-link {{ Request::is('employers*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
</li>
@endrole

<li class="nav-item">
    <a href="{{ route('employers.create') }}"
       class="nav-link {{ Request::is('employers*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
</li>
