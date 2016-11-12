# db_hello_world


In-class assignment 10/20.


1) Install git (either GUI or command-line) from https://git-scm.com/downloads. All of the commands here are for the git command-line interface and work the same on windows, mac, or linux. All git commands start with the word 'git'.


2) Clone this git repository. Cloning means you are downloading a copy of the remote repository and all of the code that is in there. You are going to make local changes, and then eventually push them back to the remote location.
```
git clone https://github.com/sjuDB/[your-repo-name].git
```

3) Go into the directory and edit this file (use any text editor that you want). In the space below, put your name where it says [lelakos90]
4) Get the status of the repository using the following command (or a GUI). it should tell you that there is an untracked file, or that there are 'changes not staged for commit'
```
git status
```

5) In order to save the change locally, you need to make git aware that you want to save the file using 'git add' on the file. 
```
git add README.md
```

6) Look at the status of the repository again. It should now tell you that there is a single file that has been modified and is 'stagesd for commit'. This means that git is aware there has been a modification, but it hasn't saved the changes yet.
```
git status
```

7) Now, we are going to save our change by using the 'git commit' command. Commit is a fancy way to say 'save'. Unlike saving you are used to, commits need to have a message accompanying them that says what changes. A good message is short and includes all the changes. It is better to commit multiple small times than one big time. Each commit is a potential place you can get your code back to if you need.

```
git commit -m "Added name to README,md file per instructions"
```

8) Check out 'git status' again. It should say that your branch is ahead by 1 commit, and use git push to publish your local commits. That's exactly what we want to do. It will most likely ask you to enter your username and password (you wouldn't want anyone to be able to overwrite your code!)

```
git status

git push 
```

9) That's it! Know that multiple people can commit to the repository and it will automatically merge the change. If your friend added to the code, but you did too and want to merge them, you''ll have to use 'git pull' before 'git push' to integrate the changes in. If you have time, get access to your neighbors repository, and add your name to his README file as well.


---------


This is where your should modify.


My name is: [Mohammed AL-Hazza]
