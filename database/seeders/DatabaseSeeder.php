<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\News;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = new User();
        $user->name = 'Mg Mg';
        $user->email = 'mgmg@gmail.com';
        $user->bio = 'The standard chunk of Lorem Ipsum used since the 150Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. Lorem ipsum dolor sit amet consectetur adipisicing elit.';
        $user->password = Hash::make('12345');
        $user->save();

        $user = new User();
        $user->name = 'April';
        $user->email = 'april@gmail.com';
        $user->bio = ' Numquam adipisci architecto ut cumque accusantium veniam deleniti doloribus aperiam, asperiores nihil.The standard chunk of Lorem Ipsum used since the 150Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. Lorem ipsum dolor sit amet consectetur adipisicing elit.';
        $user->password = Hash::make('12345');
        $user->save();

        $user = new User();
        $user->name = 'Soe Soe Aung';
        $user->email = 'soesoeaung@gmail.com';
        $user->bio = 'The standard chunk of Lorem Ipsum used since the 150Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. Lorem ipsum dolor sit amet consectetur adipisicing elit.';
        $user->password = Hash::make('12345');
        $user->save();

        $news = new News();
        $news->title = 'What is Lorem Ipsum?';
        $news->user_id = 1;
        $news->photo = "https://img.freepik.com/premium-photo/wooden-dock-with-boat-it-mountains-background_865967-306975.jpg?w=740";
        $news->content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum';
        $news->published_at = Carbon::now();
        $news->save();

        $news = new News();
        $news->title = 'Where can I get some?';
        $news->user_id = 2;
        $news->photo = "https://img.freepik.com/free-photo/beautiful-natural-view-landscape_23-2150787996.jpg";
        $news->content = "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.";
        $news->save();

        $news = new News();
        $news->title = '1914 translation by H. Rackham';
        $news->user_id = 3;
        $news->photo = "https://img.freepik.com/free-photo/scenery-landscape-peak-famous-water_1417-35.jpg?w=740&t=st=1720775309~exp=1720775909~hmac=adf72b20c7a22506f78ae9e227b8a1b843098706af6c229ac6f000724f08f27c";
        $news->content = "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains";
        $news->published_at = Carbon::parse('2024-07-01 00:00:00');
        $news->save();

        $news = new News();
        $news->title = "de Finibus Bonorum et Malorum, written by Cicero in 45 BC";
        $news->user_id = 1;
        $news->photo = "https://img.freepik.com/free-photo/laboratory-3d-glassware_23-2151560619.jpg?t=st=1720775400~exp=1720779000~hmac=9f999134b6f85d96f62bff9c351b544ccab0d41db57994deead1655f706e476f&w=740";
        $news->content = "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat";
        $news->published_at = Carbon::parse('2024-07-15 00:00:00');
        $news->save();

        $news = new News();
        $news->title = "1914 translation by H. Rackham";
        $news->user_id = 2;
        $news->photo = "https://img.freepik.com/free-photo/portrait-person-doing-arts-crafts_23-2151575732.jpg?t=st=1720775444~exp=1720779044~hmac=f0ba4df655fb05c40e9d5f86d8eb976ffa83d00ea0734f62e69ceede88bfdbdf&w=360";
        $news->content = "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?";
        $news->save();

        $news = new News();
        $news->title = "The standard Lorem Ipsum passage, used since the 1500s";
        $news->user_id = 3;
        $news->photo = "https://img.freepik.com/free-photo/landmark-forest-tourism-sunrise-famous-ancient_1417-1194.jpg?t=st=1720775481~exp=1720779081~hmac=601adf5950a6e14cbca336888d56feacac0f8f5ff325bc4c669273d4efe219a4&w=740";
        $news->content = "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?";
        $news->save();
    }
}
