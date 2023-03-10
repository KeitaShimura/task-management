CREATE TABLE task_management.users (
  id bigint(11) AUTO_INCREMENT PRIMARY KEY,
  name varchar(30) NOT NULL COMMENT '名前',
  email varchar(255) NOT NULL UNIQUE COMMENT 'メールアドレス',
  password varchar(255) NOT NULL COMMENT 'パスワード',
  path varchar(255) COMMENT '画像パス',
  created_at datetime NOT NULL COMMENT '作成日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE task_management.projects (
  id bigint(11) AUTO_INCREMENT PRIMARY KEY,
  user_id bigint(11) NOT NULL COMMENT 'ユーザーID',
  name varchar(30) NOT NULL COMMENT 'プロジェクト名',
  description text COMMENT 'プロジェクト概要',
  color_type varchar(30) COMMENT 'プロジェクトカラー',
  created_at datetime NOT NULL COMMENT '作成日時',
  CONSTRAINT fk_user_id
    FOREIGN KEY (user_id) 
    REFERENCES users (id)
    ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE task_management.tasks (
  id bigint(11) AUTO_INCREMENT PRIMARY KEY,
  project_id bigint(11) NOT NULL COMMENT 'プロジェクトID',
  title varchar(30) NOT NULL COMMENT 'タスクタイトル',
  description text NOT NULL COMMENT 'タスク詳細',
  order_num varchar(30)  COMMENT '並び順',
  status varchar(30)  COMMENT 'ステータス',
  created_at datetime NOT NULL COMMENT '作成日時',
  updated_at datetime NOT NULL COMMENT '更新日時',
  CONSTRAINT fk_project_id
    FOREIGN KEY (project_id) 
    REFERENCES projects (id)
    ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;