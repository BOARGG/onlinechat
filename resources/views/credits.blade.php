<x-layouts.app :title="__('Credits')">
    <div class="space-y-8">

    <div class="habbo-card mb-6">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-16 h-16 bg-habbo-yellow rounded-xl flex items-center justify-center text-3xl pixel-corners">
                💰
            </div>
            <div>
                <h1 class="text-2xl font-bold text-habbo-blue-dark">{{ __('Credits') }}</h1>
                <p class="text-gray-600 text-sm">{{ __('Learn more about managing and purchasing your credits') }}</p>
            </div>
        </div>
    </div>

        {{-- Today's News --}}
        <div class="grid gap-6 md:grid-cols-2">
            <div class="habbo-card">
                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    Fragen zu {{ config('app.name') }} Credits, Coins und Punkten?
                </h2>
                <div class="grid grid-cols-2 gap-3">
                    <button class="habbo-btn-secondary">
                        Was sind {{ config('app.name') }} Credits?
                    </button>
                    <button class="habbo-btn-secondary">
                        Was sind {{ config('app.name') }} Coins?
                    </button>

                    <button class="habbo-btn-secondary">
                        Was sind {{ config('app.name') }} Punkte?
                    </button>

                    <button class="habbo-btn-secondary">
                        Warum kann ich keine {{ config('app.name') }} Credits kaufen?
                    </button>

                    <button class="habbo-btn-secondary">
                        Wieso erhalte ich keine {{ config('app.name') }} Coins mehr?
                    </button>

                    <button class="habbo-btn-secondary">
                        Warum werden meine {{ config('app.name') }} Punkte nicht aktualisiert?
                    </button>
                </div>

            </div>

            <div class="habbo-card">

                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    💳 Sichere Zahlungsmethoden
                </h2>
                <p class="text-gray-600">
                    Wir bieten eine Vielzahl sicherer Zahlungsmethoden an, um dir den Kauf von
                    {{ config('app.name') }}-Credits
                    so einfach und sicher wie möglich zu machen. <br>
                    Wähle aus verschiedenen Optionen wie Kreditkarte, PayPal und mehr.
                </p>

                <p class="text-gray-600 mt-4">
                    Klicke auf die Schaltfläche unten, um unsere verfügbaren Zahlungsmethoden zu sehen!
                </p>

                <button class="habbo-btn-primary w-full mt-6">
                    Zahlungsmethoden anzeigen 🚀
                </button>

                <hr class="my-6">

                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    🔒 Sicherheitstipps
                </h2>
                <p class="text-gray-600">
                    Deine Sicherheit ist uns wichtig! Hier sind einige Tipps, um deine {{ config('app.name') }}-Credits
                    zu schützen:
                </p>
                <ul class="list-disc list-inside mt-2 text-gray-600">
                    <li>Teile deine Kontoinformationen niemals mit anderen.</li>
                    <li>Verwende starke Passwörter und ändere sie regelmäßig.</li>
                    <li>Achte auf verdächtige Aktivitäten in deinem Konto.</li>
                </ul>
                <p class="text-gray-600 mt-4">
                    Klicke auf die Schaltfläche unten, um mehr über die Sicherheit deiner Credits zu erfahren!
                </p>
                <button class="habbo-btn-primary w-full mt-6">
                    Sicherheitstipps lesen 🚀
                </button>

            </div>

        </div>

        {{-- Users Wallet --}}
        <div class="grid gap-6 md:grid-cols-2">
            <div class="habbo-card">
                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    👜 Dein {{ config('app.name') }}-Geldbeutel
                </h2>
                <p class="text-gray-600">
                    Verwalte deine {{ config('app.name') }}-Credits, Coins und Punkte ganz einfach in deinem
                    persönlichen Geldbeutel. Hier kannst du deinen aktuellen Kontostand überprüfen, Transaktionen
                    verfolgen und sehen, wie du deine Credits am besten nutzen kannst.
                </p>

                <p class="text-gray-600 mt-4">
                    Klicke auf die Schaltfläche unten, um zu deinem Geldbeutel zu gelangen und deine Credits zu
                    verwalten!
                </p>

                <button class="habbo-btn-primary w-full mt-6">
                    Geldbeutel öffnen 🚀
                </button>

                <hr class="my-6">

                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    📜 Kaufhistorie
                </h2>
                <p class="text-gray-600">
                    Behalte den Überblick über alle deine {{ config('app.name') }}-Credit-Käufe mit unserer praktischen
                    Kaufhistorie. Hier findest du eine detaillierte Auflistung aller Transaktionen, einschließlich
                    Datum, Betrag und Art der gekauften Credits.
                </p>
                <p class="text-gray-600 mt-4">
                    Klicke auf die Schaltfläche unten, um deine Kaufhistorie einzusehen!
                </p>
                <button class="habbo-btn-primary w-full mt-6">
                    Kaufhistorie anzeigen 🚀
                </button>


            </div>


            <div class="habbo-card">

                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    💰 Hol dir mehr {{ config('app.name') }}-Credits!
                </h2>
                <p class="text-gray-600">
                    Entdecke die verschiedenen Möglichkeiten, wie du {{ config('app.name') }}-Credits verdienen und
                    kaufen kannst, um dein Erlebnis zu verbessern!
                </p>
<br>
                <p class="text-gray-600 mt-4">
                    Klicke auf die Schaltfläche unten, um mehr über den Kauf von {{ config('app.name') }}-Credits zu
                    erfahren!
                </p>
                
                <button class="habbo-btn-primary w-full mt-6">
                    {{ config('app.name') }}-Credits kaufen 🚀
                </button>

                <hr class="my-6">

                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    📜 Nutzungsbedingungen für {{ config('app.name') }}-Credits
                </h2>
                <p class="text-gray-600">
                    Bitte lies unsere Nutzungsbedingungen für {{ config('app.name') }}-Credits sorgfältig durch, um
                    sicherzustellen, dass du die Regeln und Richtlinien für den Kauf und die Verwendung von Credits
                    verstehst.
                </p>

                <p class="text-gray-600 mt-4">
                    Klicke auf die Schaltfläche unten, um die vollständigen Nutzungsbedingungen zu lesen!
                </p>

                <button class="habbo-btn-primary w-full mt-6">
                    Nutzungsbedingungen lesen 🚀
                </button>

            </div>

        </div>

    </div>
</x-layouts.app>
