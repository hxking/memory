# GIT基本使用

## 本地创建git仓库：
```
git init             //初始化
touch README.md      //创建 README.md 文件
git add README.md    //添加 README.md 文件
git commit -m "你的注释"        //这次修改的注释
git remote add origin git@192.168.0.109:qq975686955/meiyongde.git   //连接远程git目录 git@后面需要修改
git push -u origin master      //提交

git remote rm origin           //删除远程选中的 Git 仓库
```

## 推送操作

### 第一步
- 添加
> git add .    //添加所有文件

- 删除
> git rm 文件名

- 修改
> git mv 当前文件 要修改成的文件

## 第二步
- 添加到缓冲区，并注释
> git commit -m "注释"

## 第三步
- 把修改提交到github
> git push -u origin master


----------------------------
## 拉取操作

- 更新操作 
>  git pull

- 拉取git项目，可独立执行
> git clone giturl

- 回退
> git reset --soft head~1

- 切换到某个分支：
> git checkout 分支名

-------


git全局设置：
```
git config --giobla user.name "吕行"                  //设置git用户
git config --giobla user.email "975686955@qq.com"    //设置git用户的邮箱
```


常用命令：：：
```
查看git版本信息：git --version
查看git全局配置：cat ~/.gitconfig
使用vim编辑配置信息：vim ~/.gitconfig
初始化本地仓库：git init
克隆一个项目：git clone 克隆文件的url
查看git当前的状态：git status
查看git日志：git log
查看日志记录详情：git show (commit号)
添加文件到待提交列表：git add 文件名
添加所有修改文件：git add --all
本次提交的注释：git commit -m "你的注释" 
撤销提交的文件：git reset --soft head~1    //从最上面撤销  柔和的撤销  撤销一次  不加--soft直接撤回到 add 之前
撤销本地没有提交的改动：git checkout 文件名
从服务器上更新：git pull origin master
删除远程选中的 Git 仓库:git remote rm origin 

查看所有分支：git branch
创建新分支：git branch 分支名
切换到某个分支：git checkout 分支名
删除分支： git branch -d 分支名
合并分支，合并分支要先切换到主分支，git merge 分支名  //把分支名合并到当前所在的分支上
```

删除文件的步骤：想删除上传上去的文件要做4步，才可以删除文件
```
1、删除提交没上传的文件：git rm 文件名
2、提交删除的注释： git commit -m "删除了文件"
3、上传： git push -u origin master
```


文件冲突，合并文件:
```
1、git add 文件名
2、git commit -m "你的注释"
3、git pull origin master
4、出现内容冲突就修改冲突文件
5、git add 文件名
6、git commit -m "你的注释"
7、git push -u origin master
```

## 忽略一些不需要提交的文件：创建.gitignore文件  在.gitignore中写你要忽略的文件 完了上传就ok