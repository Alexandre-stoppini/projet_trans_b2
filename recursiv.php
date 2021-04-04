<?php
function explore($path)
{

    $chemin = shell_exec("tree -fi $path");

    $chemin_array = preg_split('/(\/sauvegarde\/)|(\d*\sdirectories,\s\d*\sfiles)/', $chemin);
    for ($i = 1; $i < count($chemin_array)-1; $i++) {

        // print tous les fichiers
        if (preg_match('/(\.)/', $chemin_array[$i])) {
            $foo = preg_split('/(\/)/',$chemin_array[$i]);
            echo "<div class='file'>
                <div>
                    <svg viewBox='0 0 256 256'>
                        <path d='M200,80V224a8,8,0,0,1-16,0V88H67.31348l34.34375,34.34326a8.00018,8.00018,0,0,1-11.31446,11.31348l-48-48c-.0205-.02051-.03759-.04321-.05761-.064-.16358-.167-.32178-.33935-.47022-.52026-.083-.10059-.15527-.20654-.23193-.31006-.07862-.10571-.16065-.20862-.23438-.31836-.08056-.1206-.15088-.24585-.22461-.36987-.05957-.1001-.12207-.19751-.17724-.30029-.06787-.126-.125-.25538-.18506-.384-.05078-.1084-.10547-.2146-.15137-.32568-.05127-.12463-.09326-.252-.13867-.37842-.04248-.11987-.08887-.238-.126-.36059-.03857-.12769-.06738-.25757-.09912-.38672-.03125-.124-.06592-.24622-.09131-.37244-.02978-.15088-.04785-.30334-.06933-.45544-.01465-.10645-.03516-.21094-.0459-.31861a8.02276,8.02276,0,0,1,0-1.584c.01074-.10767.03125-.21216.0459-.31861.02148-.1521.03955-.30456.06933-.45544.02539-.12622.06006-.24841.09131-.37244.03174-.12915.06055-.259.09912-.38672.03711-.12255.0835-.24072.126-.36059.04541-.12647.0874-.25379.13867-.37842.0459-.11108.10059-.21728.15137-.32568.06006-.12866.11719-.25806.18506-.384.05517-.10278.11767-.20019.17724-.30029.07373-.124.14405-.24927.22461-.36987.07373-.10974.15576-.21265.23438-.31836.07666-.10352.14892-.20947.23193-.31006.14844-.18091.30664-.35327.47022-.52026.02-.02076.03711-.04346.05761-.064l48-48a8.00018,8.00018,0,0,1,11.31446,11.31348L67.31348,72H192A8.00008,8.00008,0,0,1,200,80Z'/>
                    </svg>
                    <span>" . $foo[count($foo)-1] . "</span>
                </div>
                <div>
                    <a href='/sauvegarde/". $chemin_array[$i] ."' download>
                    <svg viewBox='0 0 489.4 489.4' style='enable-background:new 0 0 489.4 489.4;' xml:space='preserve'>
                    <g>
                        <g>
                            <path d='M0,348.65v84.2c0,28.9,23.5,52.5,52.5,52.5h384.4c28.9,0,52.5-23.5,52.5-52.5v-84.2c0-28.9-23.5-52.5-52.5-52.5h-106
                                c-10.8,0-19.8,8.2-20.9,19c-3.4,33.6-31.5,58.9-65.3,58.9s-61.9-25.3-65.3-58.9c-1.1-10.8-10.1-19-20.9-19h-106
                                C23.6,296.15,0,319.65,0,348.65z M244.7,398.55c45.4,0,83.3-33.3,89.3-77.9h102.9c15.4,0,28,12.5,28,28v84.2c0,15.4-12.5,28-28,28
                                H52.5c-15.4,0-28-12.5-28-28v-84.2c0-15.4,12.5-28,28-28h102.9C161.4,365.25,199.3,398.55,244.7,398.55z'/>
                            <path d='M244.7,4.05c-6.8,0-12.3,5.5-12.3,12.3v209.8l-59.3-59.3c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l80.2,80.2
                                c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6l80.2-80.2c4.8-4.8,4.8-12.5,0-17.3s-12.5-4.8-17.3,0l-59.3,59.3V16.25
                                C256.9,9.55,251.5,4.05,244.7,4.05z'/>
                        </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    </svg>
                    </a>
                </div>
                </div>";
        } else {
            echo "<div class='dir'>
            <svg viewBox='0 0 48 48' enable-background='new 0 0 48 48'>
                <path fill='#FFA000' d='M40,12H22l-4-4H8c-2.2,0-4,1.8-4,4v8h40v-4C44,13.8,42.2,12,40,12z'/>
                <path fill='#FFCA28' d='M40,12H8c-2.2,0-4,1.8-4,4v20c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V16C44,13.8,42.2,12,40,12z'/>
            </svg>
            <span>" . $chemin_array[$i]."</span>
            </div>";
        }
    }
}
