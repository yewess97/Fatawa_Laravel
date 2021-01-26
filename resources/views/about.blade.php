@extends('layout.all_main')

@section('content')

    <!--Page title-->
    <section class="page-title-section about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="text-center">
                        <li class="profile" style="color: #FFFFFF">مـــــــن نحــــــن</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--About-->
    <section class="about-section" style="background-color: #dfe9d0; padding-top: 60px" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="about-section-title text-center">موقع فتاوى سؤال وجواب</h2>
                    <div class="about-section-text text-justify mt-5">
                        <p>الرؤية:</p>
                        <span>موسوعة معرفية عن الإسلام</span>
                        <p>الرسالة:</p>
                        <span>موقع فتاوى سؤال وجواب موقع دعوي، علمي، تربوي، يهدف إلى تقديم الاستشارات والإجابات العلمية المؤصَّلة بشكلٍ وافٍ وميسر، ويقوم بالإشراف على هذه الإجابات العبد لله يوسف ايمن.<br><br></span>
                        <span>يرحب الموقع بالأسئلة من جميع السائلين مسلمين أو غيرهم في الأمور الشرعية أو النفسية والاجتماعية.</span>
                        <p>أهداف الموقع:</p>
                        <ol class="mr-3">
                            <li>نشر الإسلام والدعوة إليه.</li>
                            <li>نشر العلم الشرعي ورفع الجهل عن المسلمين وغير المسلمين.</li>
                            <li>تلبية حاجة الناس بتقديم الاستشارات والإجابات الشرعية المؤصَّلة.</li>
                            <li>رد شبهات المشككين عن الإسلام.</li>
                            <li>توجيه الناس في القضايا الحياتية بتقديم الاستشارات العلمية والتربوية والاجتماعية
                                وغيرها.
                            </li>
                        </ol>
                        <p>منهج الموقع:</p>
                        <span>يقوم الموقع على نشر عقيدة أهل السنة والجماعة واتباع السلف الصالح، ويتحرَّى أن تكون الإجابات مبنية على الدليل من القرآن الكريم والسنة النبوية الصحيحة ومأخوذة من كلام العلماء من أصحاب المذاهب الأربعة: الإمام أبي حنيفة، والإمام مالك، والإمام الشافعي، والإمام أحمد بن حنبل، وغيرهم من أهل العلم المتقدمين والمتأخرين، وقرارات المجامع الفقهية، وطلبة العلم من الباحثين في مختلف التخصصات الشرعية.<br><br></span>
                        <span>ويتجنب الموقع الدخول في القضايا التي لا فائدة فيها من المهاترات والسباب والشتائم والجدل العقيم.<br><br></span>
                        <span>اللهم إنا نسألك الثَّباتَ في الأمرِ، والعزيمةَ على الرُّشدِ، والتوفيق لما تحبه وترضاه.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Milestones-->

    <div class="milestones">
        <div class="milestones_background" style="background-image:url(images/profile_background.jpg)"></div>

        <div class="container">
            <div class="row">

                <!--Milestone1-->
                <div class="col-lg-4 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon first-icon"><img src="{{asset('images/notepad_about.svg')}}" alt="questions_icon">
                        </div>
                        <div class="milestone_counter" data-end-value="{{$questions}}" data-sign-before="+">0</div>
                        <div class="milestone_text">عدد الأسئلة</div>
                    </div>
                </div>

                <!--Milestone2-->
                <div class="col-lg-4 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="{{asset('images/man_about.svg')}}" alt="shuyukh_icon">
                        </div>
                        <div class="milestone_counter" data-end-value="{{$sheikhs}}" data-sign-before="+">0</div>
                        <div class="milestone_text">الشيوخ الحاليون</div>
                    </div>
                </div>

                <!--Milestone3-->
                <div class="col-lg-4 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="{{asset('images/group_about.svg')}}" alt="users_icon">
                        </div>
                        <div class="milestone_counter" data-end-value="{{$users}}" data-sign-before="+">0</div>
                        <div class="milestone_text">المستخدمون الحاليون</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Supervisor word-->
    <section class="about-section bg-cover" data-background="images/success-story.jpg" dir="rtl">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-sm-8">
                    <div class="supervisor bg-white p-5 text-justify">
                        <h2 class="supervisor-title">كلمة للمشرف العام</h2>
                        <p>نرجو أن نكون قد عَلِمنا حقيقة الإفتاء وشروطه ومناهجه، وعَلِمنا كذلك أركانه وآدابه وذلك كله
                            يجعلنا نعلم أن الإفتاء ليس بالعملية السهلة حتى يتجرأ عليه كل أحد ويتسرع في ادِّعاء القدرة
                            عليه، وفي عصرنا هذا وفي حالتنا الثقافية يتحقق موعود المصطفى صلَّ الله عليه وسلم من الأمور
                            العظيمة التي لا نعرف هل ذكر لنا منها رسول الله - صلَّ الله عليه وسلم - شيئًا أم لا، فعن سمرة
                            بن جندب مرفوعًا: «ولن يكون ذلك كذلك حتى تروا أمورًا عظامًا يتفاقم شأنها في أنفسكم، وتساءلون
                            بينكم هل كان نبيكم ذكر لكم منها ذكرًا»</p>
                        <p>فهذه الحالة الثقافية التي نمر بها والتي لم تستقر بعد، ولم تتحدد مفاهيم كثيرة منها، والتي خرج
                            الرويبضة من الناس ليساهمون فيها ويتكلمون في الشأن العام، من التصدّر للنصيحة حتى الطبية منها،
                            إلى الإفتاء ولو بغير علم، مع أنه لم يحفظ آية كاملة إلا في قصار السور، إلى تولي المناصب
                            العامة، إلى الكلام في الشيوعية البائدة أو الفن الجديد، إلى من يريدنا أن ننسلخ عن أنفسنا
                            وديننا وتاريخنا، إلى من يريد إرهابًا فكريًّا، إما هو وإما الجحيم، ثم جحيمه هو الجنة، وجنته
                            هي الجحيم؛ لأنه دجال من الدجاجلة.</p>
                        <p>والمخرج من ذلك كله هو الصبر والتأكيد على الحرية الملتزمة، وترك الرويبضة من الناس يكتشفونهم
                            العقلاء ذوي الفطرة السليمة في تفاهتهم وفي هشاشة تفكيرهم.</p>
                        <p>ونسأل الله السداد والتوفيق.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
