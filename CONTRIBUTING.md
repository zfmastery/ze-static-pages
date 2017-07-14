# CONTRIBUTING

## RESOURCES

If you wish to contribute to this project, please be sure to
read/subscribe to the [Coding Standards](https://github.com/zendframework/zf2/wiki/Coding-Standards)
 
If you are working on new features or refactoring [create a proposal](https://github.com/zfmastery/ze-static-pages/issues/new).

## RUNNING TESTS

To run tests:

- Clone the repository:

  ```console
  $ git clone git@github.com:zfmastery/ze-static-pages.git
  $ cd
  ```

- Install dependencies via composer:

  ```console
  $ curl -sS https://getcomposer.org/installer | php --
  $ ./composer.phar install
  ```

  If you don't have `curl` installed, you can also download `composer.phar` from https://getcomposer.org/

- Run the tests:

  ```console
  $ composer test
  ```

You can turn on conditional tests with the `phpunit.xml` file.
To do so:

 -  Copy `phpunit.xml.dist` file to `phpunit.xml`
 -  Edit `phpunit.xml` to enable any specific functionality you
    want to test, as well as to provide test values to utilize.

## Running Coding Standards Checks

This component follows [PSR-1](http://www.php-fig.org/psr/psr-1/) and
[PSR-2](http://www.php-fig.org/psr/psr-2/) guidelines, and ships with tooling
for both checking code against standards, as well as fixing most errors.

To run checks only:

```console
$ composer cs-check
```

To fix common errors:

```console
$ composer cs-fix
```

If you allow tooling to fix CS issues, please re-run the tests to ensure
they pass, and make sure you add and commit the changes after verification.

## Recommended Workflow for Contributions

Your first step is to establish a public repository from which we can
pull your work into the master repository. We recommend using
[GitHub](https://github.com), as that is where the component is already hosted.

1. Setup a [GitHub account](http://github.com/), if you haven't yet
2. Fork the repository (http://github.com/zfmastery/ze-static-pages)
3. Clone the canonical repository locally and enter it.

   ```console
   $ git clone git://github.com:zfmastery/ze-static-pages.git
   $ cd ze-static-pages
   ```

4. Add a remote to your fork; substitute your GitHub username in the command
   below.

   ```console
   $ git remote add {username} git@github.com:{username}/ze-static-pages.git
   $ git fetch {username}
   ```

### Keeping Up-to-Date

Periodically, you should update your fork or personal repository to
match the canonical ZF repository. Assuming you have setup your local repository
per the instructions above, you can do the following:


```console
$ git checkout master
$ git fetch origin
$ git rebase origin/master
# OPTIONALLY, to keep your remote up-to-date -
$ git push {username} master:master
```

If you're tracking other branches -- for example, the "develop" branch, where
new feature development occurs -- you'll want to do the same operations for that
branch; simply substitute  "develop" for "master".

### Working on a patch

We recommend you do each new feature or bugfix in a new branch. This simplifies
the task of code review as well as the task of merging your changes into the
canonical repository.

A typical workflow will then consist of the following:

1. Create a new local branch based off either your master or develop branch.
2. Switch to your new local branch. (This step can be combined with the
   previous step with the use of `git checkout -b`.)
3. Do some work, commit, repeat as necessary.
4. Push the local branch to your remote repository.
5. Send a pull request.

The mechanics of this process are actually quite trivial. Below, we will
create a branch for fixing an issue in the tracker.

```console
$ git checkout -b hotfix/9295
Switched to a new branch 'hotfix/9295'
```

... do some work ...


```console
$ git commit
```

... write your log message ...


```console
$ git push {username} hotfix/9295:hotfix/9295
Counting objects: 38, done.
Delta compression using up to 2 threads.
Compression objects: 100% (18/18), done.
Writing objects: 100% (20/20), 8.19KiB, done.
Total 20 (delta 12), reused 0 (delta 0)
To ssh://git@github.com/{username}/zend-servicemanager.git
   b5583aa..4f51698  HEAD -> master
```

To send a pull request, create a pull request on GitHub. Navigate to
your repository, select the branch you just created, and then select the
"Pull Request" button in the upper right. Select the user/organization
"zfmastery" as the recipient.

#### What branch to issue the pull request against?

Which branch should you issue a pull request against?

- For fixes against the stable release, issue the pull request against the
  "master" branch.
- For new features, or fixes that introduce new elements to the public API (such
  as new public methods or properties), issue the pull request against the
  "develop" branch.

### Branch Cleanup

As you might imagine, if you are a frequent contributor, you'll start to
get a ton of branches both locally and on your remote.

Once you know that your changes have been accepted to the master
repository, we suggest doing some cleanup of these branches.

-  Local branch cleanup

   ```console
   $ git branch -d <branchname>
   ```

-  Remote branch removal

   ```console
   $ git push {username} :<branchname>
   ```


## Conduct

Please see our [CONDUCT.md](CONDUCT.md) to understand expected behavior when interacting with others in the project.
