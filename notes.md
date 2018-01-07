# Tilte because linter demands it

## Create some data

```php
$threads = factory('App\Thread', 50)->create()
$threads->each(function($thread) { factory('App\Reply', 10)->create(['thread_id' => $thread->id]); });
```

## Tip

Interesting nugget. `ctrl p` in vscode respects settings in .gitignore. So by default, it does not show files in those areas.

Set the following in workspace settings to allow it to find files in there. I don't think it would be a good idea to have it set everywhere.

```json
   "search.useIgnoreFiles": false
```

## Tip

Turn off exception handling in tests within the test method.

```php
    $this->withoutExceptionHandling();
```

## Tip - ICloud & Commandline

You ICloud files are not available in your home folder. Heres how to CD in. Who'd have thought...

```bash
    cd ~/Library/Mobile\ Documents/com~apple~CloudDocs/
```

## Stumped: `::` and `->` in model

`::` is for access static parts of a class, `->` is for instance parts. However...

```php
    App\Thread::find(1); //this works

    $thread = new App\Thread();
    $thread::find(1); //So does this. Static method of an instance
    $thread->find(1); //So does this. Instance method of an instance
```

More reading required on classes needed!

## Optional

In the below example, $myVar will be null if profile does not exist, rather than blowing up.

```php
    $myVar = optional($user->profile)->location;
```

## Testing: Create/Make

Create: Makes all fields that exist on the table, including id
Make: Just makes the fields defined in the model factory, leaving out specifc DB related fields.

[Link to good article](https://scotch.io/tutorials/generate-dummy-laravel-data-with-model-factories)

```php
    $user = factory('App\User')->create(); //Create the user in the DB and return it.
    $user = factory('App\User')->make(); //Make the user in memory and return it. No id or timestamps
```

```json
//Using create
    {
        id: 51,
        created_at: "2018-01-06 02:03:39",
        updated_at: "2018-01-06 02:03:39",
        user_id: 562,
        title: "Aspernatur est est non qui facilis deleniti.",
        body: "Vitae pariatur consequatur omnis itaque quam consequatur et. Et molestiae aut eius praesentium et. Impedit assumenda illo cumque rerum quia dolorem et. Libero laudantium aut magni fugit enim necessitatibus eum.",
   }

// Using Make
   {
        user_id: 563,
        title: "Ut qui molestiae voluptas pariatur.",
        body: "Minima eius deserunt aliquid cum et. Molestiae consequuntur consectetur et dolorem omnis unde non. Doloribus corrupti temporibus ratione. Est qui dicta dignissimos et ratione.",
   }
```
