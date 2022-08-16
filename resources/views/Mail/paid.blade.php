<h2>مرحبا،{{ $sponsor->user->name }}</h2>
<br>
<p>نود إعلامك أنه اليوم لديك دفعة لكفالتك بمبلغ
    قدره {{ is_null($orphan->salary_year) ? $orphan->salary_month : $orphan->salary_year }}</p>

شكرا لك.
